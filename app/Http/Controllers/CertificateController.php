<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;

class CertificateController extends Controller
{
    public function index(): JsonResponse
    {
        $user = Auth::user();
        $certs = [];

        if ($user->role->name === 'admin') {
            $certs = Certificate::with('client')->get();
        }
        if ($user->role->name === 'limited_admin') {
            $certs = Certificate::query()->where('branch_user_id', $user->id)->with('client')->get();
        }
        if ($user->role->name === 'user') {
            $certs = Certificate::query()->where('user_id', $user->id)->with('client')->get();
        }
        if ($user->role->name === 'operator') {
            $certs = Certificate::query()->where('operator_id', $user->id)->with('client')->get();
        }

        return response()->json([
            'success' => true,
            'result' => $certs
        ]);
    }


    public function store(StoreCertificateRequest $request): JsonResponse
    {
        $user = Auth::user();
        $inputs = $request->all();
        $inputs['user_id'] = $user->id;
        $inputs['branch_user_id'] = $user->branch_user_id;
        $certificate = Certificate::query()->create($inputs);
        return response()->json([
            'success' => true,
            'message' => 'certificate successfully created',
            'result' => $certificate
        ]);
    }


    public function show($id): JsonResponse
    {
        $user = Auth::user();
        $findCertificate = Certificate::query()->where('user_id', $user->id)->find($id);
        if ($findCertificate) {
            return response()->json([
                'success' => true,
                'message' => 'certificate found',
                'result' => $findCertificate
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'certificate not found',
            'result' => []
        ], 404);
    }


    public function update(UpdateCertificateRequest $request, $id): JsonResponse
    {
        if ($request->all() == null) {
            return response()->json(['error' => true, 'message' => 'Insert something to update certificate'],401);
        }
        $user = Auth::user();
        $findCertificate = Certificate::query()->where('user_id', $user->id)->find($id);
        if ($findCertificate) {
            $inputs = $request->all();
            $inputs['user_id'] = $user->id;
            $inputs['branch_user_id'] = $user->branch_id;
            $findCertificate->update($inputs);

            return response()->json([
                'success' => true,
                'message' => 'certificate successfully updated',
                'result' => $findCertificate
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'certificate not found',
            'result' => []
        ], 404);

    }


    public function destroy($id): JsonResponse
    {
        $user = Auth::user();
        $findCertificate = Certificate::query()->where('user_id', $user->id)->find($id);
        if ($findCertificate) {
            $findCertificate->delete();
            return response()->json([
                'success' => true,
                'message' => 'certificate successfully deleted',
                'result' => $findCertificate
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'certificate not found',
            'result' => []
        ], 404);
    }


}
