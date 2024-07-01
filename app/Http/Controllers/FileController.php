<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


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

    protected function store(Request $request): JsonResponse|string
    {
        $validator = Validator::make($request->all(), [
            'type' => ['required', Rule::in('category', 'brand', 'product', 'user', 'banner')],
            'photo' => 'required|file|mimes:jpg,jpeg,png,svg',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->messages()], 400);
        }
        //create folder
        $imagePath = $request['photo']->store($request->type);
        return response()->json(['status' => true, 'result' => Storage::disk('public')->url($imagePath)]);
    }

    protected function destroy($path): JsonResponse
    {
        // Remove the '/storage' prefix from the path
        $path = str_replace('/storage', '', $path);
        // Delete the image from the public disk
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return response()->json(['status' => false, 'message' => 'Image deleted successfully']);
        } else {
            return response()->json(['status' => true, 'message' => 'Image not found'], 404);
        }
    }
}
