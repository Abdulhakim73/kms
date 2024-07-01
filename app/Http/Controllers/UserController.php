<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\error;

class UserController extends Controller
{

    public function index(): Collection
    {
        return User::all();
    }


    public function show(int $id): JsonResponse
    {
        $user = User::query()->find($id);
        if (!$user) {
            return response()->json(['error' => true, 'message' => 'User not found']);
        }

        return response()->json(['success' => true, 'result' => $user]);
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $inputs = $request->only('full_name', 'email', 'district_id', 'region_id', 'street',
            'role_id', 'status', 'phone', 'birthday', 'branch_id');

        // hashing pass
        $inputs['password'] = Hash::make($request['password']);

        // if uploaded image
        if ($request->file('photo')) {
            //send file
            $response = $this->storeFile('user', $request->file('photo'));
            //if accurate error
            if ($response['status'] == false) {
                return response()->json(['error' => true, 'message' => $response['message']['type']], 400);
            }
            $inputs['photo'] = $response['result'];
        }
        //create user
        DB::table('users')->insert($inputs);
        return response()->json(['success' => true, 'message' => 'User created successfully',
            'user' => [
                'email' => $request['email'],
                'password' => $request['password'],
            ]]);
    }


    public function update(UpdateUserRequest $request, $id): JsonResponse
    {
        if ($request->all() == null) {
            return response()->json(['error' => true, 'message' => 'insert something to update your profile'], 400);
        }

        $user = User::query()->find($id);
        if ($user) {

            $inputs = $request->only('full_name', 'email', 'district_id', 'region_id', 'street',
                'role_id', 'status', 'phone', 'birthday', 'branch_id');

            //image
            if ($request->file('photo')) {
                //rm file
                if ($user->photo != null) {
                    $this->rmFile($user->photo);
                }
                //send file
                $response = $this->storeFile('user', $request->file('photo'));
                //if accurate error
                if ($response['status'] == false) {
                    return response()->json(['error' => true, 'message' => $response['message']['type']], 400);
                }
                $inputs['photo'] = $response['result'];
            }

            $user->update($inputs);
            return response()->json(['success' => true, 'message' => 'User updated successfully',
                'user' => [
                    'email' => $request['email'],
                ]]);
        }
        return response()->json(['error' => true, 'message' => 'User not found'], 404);
    }

    public function destroy($id): JsonResponse
    {
        $user = User::query()->findOrFail($id);
        if ($user->photo != null) {
            $this->rmFile($user->photo);
        }
        $user->delete();
        return response()->json(['success' => true, 'message' => 'User deleted']);
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

