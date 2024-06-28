<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Region;
use App\Traits\PermissionCheck;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use PermissionCheck, AuthorizesRequests, ValidatesRequests;

    public function successResponse(string $message, array|object $result): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'result' => $result
        ]);
    }

    public function errorResponse(string $message, array|object $result, int $code): JsonResponse
    {
        return response()->json([
            'error' => true,
            'message' => $message,
            'result' => $result
        ], $code);
    }
}
