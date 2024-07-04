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
        $inputs = $request->only(['file_name', 'petition_text', 'device_id',
            'operator_id', 'client_id', 'request', 'container']);
        $inputs['type'] = $request['type'] ?? Request::TYPE_CREATE;
        $inputs['status'] = $request['status'] ?? Request::STATUS_PENDING;
        $inputs['user_id'] = $user->id;
        $inputs['branch_user_id'] = $user->branch_id;
        $newRequest = Request::query()->create($inputs);

        sendNotifications(RequestCreateEvent::class, $user, $newRequest, $user->id);
        return response()->json([
            'success' => true,
            'message' => 'Request successfully created',
            'result' => $newRequest
        ]);
    }


    public function show($id): JsonResponse
    {
        $findRequest = Request::query()->find($id);
        if ($findRequest) {
            return response()->json([
                'success' => true,
                'message' => 'Request found',
                'result' => $findRequest
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Request not found',
            'result' => []
        ], 404);
    }


    public function update(UpdateRequestRequest $request, $id): JsonResponse
    {
        if ($request->all() == null) {
            return response()->json(['error' => true, 'message' => 'Insert some data to update request'], 401);
        }
        $findRequest = Request::query()->find($id);
        if ($findRequest) {
            $user = Auth::user();
            $inputs = $request->all();
            $findRequest->update($inputs);

            sendNotifications(RequestUpdateEvent::class, $user, $findRequest, $user->id);
            return response()->json([
                'success' => true,
                'message' => 'Request successfully updated',
                'result' => $findRequest
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Request not found',
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
            'message' => 'Request status updated',
            'result' => $findRequest
        ]);
    }
}
