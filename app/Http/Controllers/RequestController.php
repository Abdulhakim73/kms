<?php

namespace App\Http\Controllers;

use App\Events\RequestCreateEvent;
use App\Events\RequestUpdateEvent;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateRequestRequest;
use App\Http\Requests\UpdateRequestStatus;
use App\Models\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{

    public function index(): JsonResponse
    {
        $query = Request::query()->with(['user', 'client']);
        $user = Auth::user();
        $request = [];
        if ($user->role->name === 'admin') {
            $request = $query->get();
        }
        if ($user->role->name === 'limited_admin') {
            $users = User::query()->where('branch_id', $user->branch_id)->get('id')->toArray();
            $request = $query->whereIn('user_id', $users)->get();
        }
        if ($user->role->name === 'user') {
            $request = $query->where('user_id', $user->id)->get();
        }
        return response()->json([
            'success' => true,
            'message' => 'All requests',
            'result' => $request
        ]);
    }


    public function store(StoreRequestRequest $request): JsonResponse
    {
        $user = Auth::user();
        $newRequest = Request::query()->create([
            'file_name' => $request['file_name'],
            'type' => Request::TYPE_CREATE,
            'status' => Request::STATUS_PENDING,
            'user_id' => $user->id,
            'branch_user_id' => $user->branch_id,
            'device_id' => $request['device_id'],
            'operator_id' => $request['operator_id'],
            'client_id' => $request['client_id'],
            'request' => $request['request'],
            'container' => $request['container'],
        ]);

        sendNotifications(RequestCreateEvent::class, $user, $newRequest, $user->id);
        return response()->json([
            'success' => true,
            'message' => 'request.successfully.created',
            'result' => $newRequest
        ]);
    }


    public function show($id): JsonResponse
    {
        $findRequest = Request::query()->find($id);
        if ($findRequest) {
            return response()->json([
                'success' => true,
                'message' => 'request.successfully.found',
                'result' => $findRequest
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'request.not-found',
            'result' => []
        ], 404);
    }


    public function update(UpdateRequestRequest $request, $id): JsonResponse
    {
        $findRequest = Request::query()->find($id);
        $user = Auth::user();
        if ($findRequest) {
            $findRequest->file_name = $request['file_name'];
            $findRequest->type = $request['type'];
            $findRequest->status = $request['status'];
            $findRequest->petition_text = $request['petition_text'];
            $findRequest->device_id = $request['device_id'];
            $findRequest->operator_id = $request['operator_id'];
            $findRequest->client_id = $request['client_id'];
            $findRequest->request = $request['request'];
            $findRequest->container = $request['container'];
            $findRequest->update();

            sendNotifications(RequestUpdateEvent::class, $user, $findRequest, $user->id);
            return response()->json([
                'success' => true,
                'message' => 'request.successfully.updated',
                'result' => $findRequest
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'request.not-found',
            'result' => []
        ], 404);
    }


    public function destroy($id): JsonResponse
    {
        $findRequest = Request::query()->findOrFail($id);
        $findRequest->delete();
        return response()->json([
            'success' => true,
            'message' => 'request.successfully.deleted',
            'result' => $findRequest
        ]);
    }

    public function statusUpdate(UpdateRequestStatus $request): JsonResponse
    {
        $findRequest = Request::query()->findOrFail($request['request_id']);
        $findRequest->status = $request['status'];
        $findRequest->save();
        return response()->json([
            'success' => true,
            'message' => 'request.successfully.status-updated',
            'result' => $findRequest
        ]);
    }
}
