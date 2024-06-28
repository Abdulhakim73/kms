<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReverseRequest;
use App\Models\ReverseRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReverseRequestController extends Controller
{
    public function index(): JsonResponse
    {
        $user = Auth::user();
        $query = ReverseRequest::query()->with('request');
        $clients = [];
        if ($user->role->name === 'admin') {
            $clients = $query->get();
        }
        if ($user->role->name === 'limited_admin') {
            $users = User::where('branch_id', $user->branch_id)->get('id')->toArray();
            $clients = $query->whereIn('user_id', $users)->get();
        }
        if ($user->role->name === 'user') {
            $clients = $query->where('user_id', $user->id)->get();
        }
        if ($user->role->name === 'operator') {
            $clients = [];
        }
        return response()->json([
            'success' => true,
            'message' => 'index',
            'result' => $clients
        ]);
    }

    public function store(StoreReverseRequest $request)
    {
        $user = Auth::user();
        if (Gate::allows('store', [$user])) {
            $rr = ReverseRequest::create([
                'type' => $request->type,
                'file' => $request->file,
                'image' => $request->image,
                'message' => $request->message,
                'request_id' => $request->request_id,
                'user_id' => $user->id
            ]);
            return response()->json([
                'success' => true,
                'message' => 'reverseRequest.successfully.create',
                'result' => $rr
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'access.denied',
            'result' => []
        ], 403);
    }
}
