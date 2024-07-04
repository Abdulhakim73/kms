<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function changePassword(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => true, $validator->messages()]);
        }
        $user = $request->user();
        $inputs = $request->all();

        if (!Hash::check($inputs['old_password'], $user->password)) {
            return response()->json(['error' => true, 'message' => 'Old password is wrong']);
        }
        if ($inputs['password'] !== $inputs['confirm_password']) {
            return response()->json(['error' => true, 'message' => 'Passwords are not same']);
        }
        $user->password = Hash::make($inputs['password']);
        $user->save();

        return response()->json(['success' => true, 'message' => 'Passwords changed successfully']);
    }
}
