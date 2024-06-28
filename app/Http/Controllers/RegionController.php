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
            'city_id' => 'required|integer|exists:cities,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->messages()]);
        }

        $region = new Region();
        $region->name = $request->region;
        $region->city_id = $request->city_id;
        $region->save();

        return response()->json(['status' => true, 'message' => 'Region successfully created', 'result' => $region]);
    }


    public function show($id): JsonResponse
    {
        $region = Region::query()->findOrFail($id);
        return response()->json(['status' => true, 'result' => $region]);
    }


    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'region' => 'required|string',
            'city_id' => 'required|integer|exists:cities,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->messages()]);
        }
        $region = Region::query()->findOrFail($id);

        $region->name = $request->region;
        $region->city_id = $request->city_id;
        $region->update();

        return response()->json(['status' => true, 'message' => 'Region successfully updated', 'result' => $region]);

    }

    public function destroy($id): JsonResponse
    {
        $findRegion = Region::query()->findOrFail($id);
        $findRegion->delete();
        return response()->json(['status' => true, 'message' => 'Region deleted']);
    }
}
