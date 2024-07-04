<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\UserDevice;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard()->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $user = Auth::user();

            return response()->json([
                'success' => true, 'message' => 'User Logged In Successfully',
                'token' => $user->createToken('Token', ['*'], Carbon::now()->addDay())->plainTextToken,
                'user_data' => [
                    'first_name' => $user->full_name,
                    'type' => $user->role->name,
                    'photo' => $user->photo,
                    'language' => $user->language,
                ],
            ]);
        }
        return response()->json(['error' => true, 'message' => 'invalid login details'], 401);
    }

    public function logout(): array
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'user logged out'
        ];
    }


    public function EnterDevice($request): JsonResponse
    {
        $id = Auth::id();
        $inputs = $request->all();

        $addDevice = new UserDevice();
        $addDevice['user_id'] = $id;
        $addDevice['type'] = $inputs['type'];
        $addDevice['platform'] = $inputs['platform'] ?? 'windows';
        $addDevice['device_id_type'] = $inputs['device_id_type'];
        $addDevice['device_id_number'] = $inputs['device_id_number'] ?? null;
        $addDevice['is_primary'] = $inputs['is_primary'] ?? 0;
        $addDevice['status'] = $inputs['status'];
        $addDevice['os_version'] = $inputs['os_version'] ?? null;
        $addDevice['model'] = $inputs['model'] ?? null;
        $addDevice['firebase_token'] = $inputs['firebase_token'] ?? null;
        $addDevice->save();

        return response()->json(['success' => true, 'message' => 'User device created', 'data' => $addDevice]);
    }

}
