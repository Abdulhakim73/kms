<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\District;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        $user = User::query()->where('email', $credentials['email'])->first();

        if ($user) {
            $inputs['user_data'] = [
                'first_name' => $user->full_name,
                'type' => $user->role->name,
                'photo' => $user->photo,
                'language' => $user->language,
            ];
            if (Hash::check($credentials['password'], $user->password)) {
                return response()->json([
                    'success' => true, 'message' => 'User Logged In Successfully',
                    'token' => $this->generateToken($user),
                    'user_data' => $inputs['user_data'],
                ], 200);
            }
            return response()->json(['error' => true,
                'message' => 'Email & Password does not match with our record.'], 401);
        }
        return response()->json(['error' => true,
            'message' => 'Email & Password does not match with our record.'], 401);
    }

    public function logout(): array
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'user logged out'
        ];
    }

    public function generateToken(User $user): string
    {
        return $user->createToken("Token")->plainTextToken;
    }
}
