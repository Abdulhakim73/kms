<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\District;
use App\Models\Region;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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
        return response()->json(['status' => false, 'message' => 'invalid login details'], 401);
    }

    public function logout(): array
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'user logged out'
        ];
    }
}
