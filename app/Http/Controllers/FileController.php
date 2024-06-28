<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class FileController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        $file = $request->file('file');
        $ex = $file->getClientOriginalExtension();

        // make hashed file name
        $file_name = Str::random(20) . '.' . $ex;

        // make new file folder
        $file_path = '/' . date('Y-m');

        // store file to disk
        $r = $file->storeAs($request->type . $file_path, $file_name, 'local');

        // write to database table
        $newFile = new File();
        $newFile->client_id = $request->client_id;
        $newFile->user_id = Auth::id();
        $newFile->type = $request->type;
        $newFile->name = $file->getClientOriginalName();
        $newFile->path = $r;
        $newFile->save();

        // return response
        return response()->json([
            'success' => true,
            'message' => 'File successfully uploaded',
            'files' => $newFile
        ]);
    }
}
