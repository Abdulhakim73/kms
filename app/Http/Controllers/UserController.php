<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDevice;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(): Collection
    {
        return User::all();
    }

    public function show($id): JsonResponse
    {
        $user = User::query()->find($id);
        if (!$user) {
            return response()->json(['error' => true, 'message' => 'User not found']);
        }

        return response()->json(['success' => true, 'result' => $user]);
    }


    public function destroy($id): JsonResponse
    {
        $user = User::query()->findOrFail($id);
        $user->delete();
        return response()->json(['success' => true, 'message' => 'User deleted']);
    }


    public function EnterDevice(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string',
            'platform' => 'nullable|string',
            'device_id_type' => 'required|string',
            'device_id_number' => 'nullable|string',
            'is_primary' => 'nullable|integer',
            'status' => 'required|string',
            'os_version' => 'nullable|string',
            'model' => 'nullable|string',
            'firebase_token' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->messages()]);
        }

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


//    public function changePassword(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'old_password' => 'string|min:6|required',
//            'password' => 'string|min:6|required',
//            'confirm_password' => 'string|min:6|required',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json(['error' => true, $validator->messages()]);
//        }
//        $user = $request->user();
//        $inputs = $request->all();
//
//        if ($inputs['password'] !== $inputs['confirm_password']) {
//            return response()->json(['error' => true, 'message' => 'Passwords are not same']);
//        }
//        if (!Hash::check($inputs['old_password'], $user->password)) {
//            return response()->json(['error' => true, 'message' => 'Old password is wrong']);
//        }
//        $user->password = Hash::make($inputs['password']);
//        $user->save();
//
//        return response()->json(['success' => true, 'message' => 'Passwords changed successfuly']);
//    }


//    public function forgotPassword(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'email' => 'email|nullable',
//            'phone' => 'numeric|nullable|digits:12|regex:/(998)[0-9]{9}/',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json(['error' => true, $validator->messages()]);
//        }
//
//        $inputs = $request->only('email', 'phone');
//        if (empty($inputs['email']) && empty($inputs['phone'])) {
//            return response()->json(['error' => true, 'message' => 'Phone or Email field is required']);
//        }
//        if (!empty($inputs['email'])) {
//            $user = User::where(['email' => $inputs['email']])->first();
//        }
//        if (!empty($inputs['phone'])) {
//            $user = User::where(['phone' => $inputs['phone']])->first();
//        }
//        if ($user) {
//            $data = [
//                'cname' => $user->name,
//                'email' => $user->email,
//                'password' => Str::random(12),
//            ];
//            if (!empty($inputs['email'])) {
//                \Mail::send('emails.forgot', $data, function ($message) use ($data) {
//                    $message->from('noreply@test.uz', 'Test.uz');
//                    $message->to($data["email"]);
//                    $message->subject('Login details from Test.UZ');
//                });
//            }
//            if (!empty($inputs['phone'])) {
//                $token = $this->getSmsToken();
//                if ($token) {
//                    $smsMessage = 'Your password to login Test.UZ ' . $data['password'];
//                    //Send SMS
//                    $sended = $this->sendSMS($token, $user->phone, $smsMessage);
//                    if ($sended) {
//                        $user->password = \Illuminate\Support\Facades\Hash::make($data['password']);
//                        $user->save();
//                    }
//                }
//            }
//            return response()->json(['success' => true, 'message' => 'Password changed and sent your email|phone. Check it out.']);
//        }
//        return response()->json(['error' => true, 'message' => 'Not found']);
//    }
}

