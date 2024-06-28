<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CertificateController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $certs = [];

        if ($user->role->name === 'admin') {
            $certs = Certificate::with('client')->get();
        }
        if ($user->role->name === 'limited_admin') {
            $certs = Certificate::where('branch_user_id', $user->x)->with('client')->get();
        }
        if ($user->role->name === 'user') {
            $certs = Certificate::where('user_id', $user->id)->with('client')->get();
        }
        if ($user->role->name === 'operator') {
            $certs = Certificate::where('operator_id', $user->id)->with('client')->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'index',
            'result' => $certs
        ]);
    }


    public function store(StoreCertificateRequest $request)
    {
        $user = Auth::user();
        if (Gate::allows('create', [$user])) {
            $certificate = Certificate::create([
                'cert_from' => $request['cert_from'],
                'cert_to' => $request['cert_to'],
                'status' => $request['status'],
                'file_name' => $request['file_name'],
                'req_id' => $request['req_id'],
                'operator_id' => $request['operator_id'],
                'client_id' => $request['client_id'],
                'user_id' => $user->id,
                'branch_user_id' => $user->branch_user_id,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'certificate.successfully.created',
                'result' => $certificate
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'access.denied',
            'result' => []
        ], 403);
    }


    public function show($id)
    {
        $user = Auth::user();
        $findCertificate = Certificate::where('user_id', $user->id)->find($id);
        if (Gate::allows('show', [$user, $findCertificate])) {
            if ($findCertificate) {
                return response()->json([
                    'success' => true,
                    'message' => 'certificate.successfully.finded',
                    'result' => $findCertificate
                ]);
            }
            return response()->json([
                'error' => true,
                'message' => 'certificate.not-found',
                'result' => []
            ], 404);
        }
        return response()->json([
            'error' => true,
            'message' => 'access.denied',
            'result' => []
        ], 403);
    }

    /**
     * Method update certificate
     * @param UpdateCertificateRequest $request
     * @param int|string $id
     * @return Response
     */
    public function update(UpdateCertificateRequest $request, $id)
    {
        $user = Auth::user();
        $findCertificate = Certificate::find($id);
        if (Gate::allows('update', [Auth::user(), $findCertificate])) {
            if ($findCertificate) {
                $findCertificate->cert_from = $request['cert_from'];
                $findCertificate->cert_to = $request['cert_to'];
                // $findCertificate->type = $request['type'];
                $findCertificate->status = $request['status'];
                $findCertificate->file_name = $request['file_name'];
                $findCertificate->req_id = $request['req_id'];
                $findCertificate->operator_id = $request['operator_id'];
                $findCertificate->client_id = $request['client_id'];
                $findCertificate->user_id = $user->id;
                $findCertificate->branch_user_id = $user->branch_id;
                $findCertificate->save();
                return response()->json([
                    'success' => true,
                    'message' => 'certificate.successfully.updated',
                    'result' => $findCertificate
                ]);
            }
            return response()->json([
                'error' => true,
                'message' => 'certificate.not-found',
                'result' => []
            ], 404);
        }
        return response()->json([
            'error' => true,
            'message' => 'access.denied',
            'result' => []
        ], 403);
    }

    /**
     * Method soft delete certificate
     * @param int|string $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $findCertificate = Certificate::find($id);
        if (!$findCertificate) {
            if (Gate::allows('delete', [$user, $findCertificate])) {
                $findCertificate->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'certificate.successfully.deleted',
                    'result' => $findCertificate
                ]);
            }
            return response()->json([
                'error' => true,
                'message' => 'access.denied',
                'result' => []
            ], 403);
        }
        return response()->json([
            'error' => true,
            'message' => 'certificate.not-found',
            'result' => []
        ], 404);
    }
}
