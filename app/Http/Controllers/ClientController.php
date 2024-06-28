<?php

namespace App\Http\Controllers;

use App\Events\ClientCreateEvent;
use App\Events\ClientUpdateEvent;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(): JsonResponse
    {
        $user = Auth::user();
        $query = Client::query()->with('user');
        $clients = [];
        if ($user->role->name === 'admin') {
            $clients = $query->get();
        }
        if ($user->role->name === 'limited_admin') {
            $users = User::query()->where('branch_id', $user->branch_id)->get('id')->toArray();
            $clients = $query->whereIn('user_id', $users)->get();
        }
        if ($user->role->name === 'user') {
            $clients = $query->where('user_id', $user->id)->get();
        }
        return response()->json([
            'success' => true,
            'message' => 'index',
            'result' => $clients
        ]);
    }

    public function clientsWithCerts(): JsonResponse
    {
        $user = Auth::user();
        $query = Client::query()->with(['user', 'certificate']);
        $clients = [];
        if ($user->role->name === 'admin') {
            $clients = $query->get();
        }
        if ($user->role->name === 'limited_admin') {
            $users = User::query()->where('branch_id', $user->branch_id)->get('id')->toArray();
            $clients = $query->whereIn('user_id', $users)->get();
        }
        if ($user->role->name === 'user') {
            $clients = $query->where('user_id', $user->id)->get();
        }
        return response()->json([
            'success' => true,
            'message' => 'index',
            'result' => $clients
        ]);
    }

    public function store(StoreClientRequest $request): JsonResponse
    {
        $user = Auth::user();
        $inputs = $request->all();
        $inputs['user_id'] = $user->id;
        //create client
        $client = Client::query()->create($inputs);
        //send notification through broadcast
        sendNotifications(ClientCreateEvent::class, $user, $client, $user->id);
        return response()->json([
            'success' => true,
            'message' => 'client.successfully.created',
            'result' => $client
        ]);
    }


    public function show($id): JsonResponse
    {
        $client = Client::query()->findOrFail($id);
        return response()->json([
            'status' => false,
            'message' => 'client.not-found',
            'result' => $client
        ], 400);
    }

    public function update(UpdateClientRequest $request, $id): JsonResponse
    {
        $client = Client::query()->findOrFail($id);
        $inputs = $request->all();
        $user = Auth::user();

        //update client
        $client->user_id = $inputs['user_id'];
        $client->city_id = $inputs['city_id'];
        $client->region_id = $inputs['region_id'];
        $client->street = $inputs['street'];
        $client->email = $inputs['email'];
        $client->organization = $inputs['organization'];
        $client->phone = $inputs['phone'];
        $client->certification = $inputs['certification'];
        $client->update();

        sendNotifications(ClientUpdateEvent::class, $user, $client, $user->id);

        return response()->json([
            'success' => true,
            'message' => 'client.successfully.updated',
            'result' => $client
        ]);
    }


    public function destroy($id): JsonResponse
    {
        $client = Client::query()->findOrFail($id);
        $client->delete();
        return response()->json([
            'success' => true,
            'message' => 'client.successfully.deleted',
            'result' => []
        ], 200);
    }
}
