<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{

    public function index(): Collection
    {
        return Region::all();
    }


    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'region' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->messages()]);
        }
        $newRegion = Region::query()->create($request->all());
        return response()->json(['status' => true, 'message' => 'Region successfully created', 'result' => $newRegion]);
    }


    public function show($id): JsonResponse
    {
        $findRegion = Region::query()->findOrFail($id);
        return response()->json(['status' => true, 'result' => $findRegion]);
    }


    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'region' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->messages()]);
        }
        $updateRegion = Region::query()->findOrFail($id);
        $updateRegion->update($request->all());
        return response()->json(['status' => true, 'message' => 'Region successfully updated', 'result' => $updateRegion]);
    }


    public function destroy($id): JsonResponse
    {
        $findRegion = Region::query()->findOrFail($id);
        $findRegion->delete();
        return response()->json(['status' => true, 'message' => 'Region deleted']);
    }
}
