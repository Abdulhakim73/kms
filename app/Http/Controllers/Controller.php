<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

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


    protected function storeFile($type, $photo): JsonResponse|string
    {
        $fileUpload = new FileController();
        $response = $fileUpload->store(new Request([
            'type' => $type,
            'photo' => $photo,
        ]));
        return json_decode($response->getContent(), true);
    }

    protected function rmFile($path): JsonResponse
    {
        $rmFile = new FileController();
        return $rmFile->destroy($path);
    }


}
