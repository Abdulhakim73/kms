<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{

    public function index(): Collection
    {
        return District::all();
    }


    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'district' => 'required|string',
            'region_id' => 'required|integer|exists:regions,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->messages()]);
        }

        $newDistrict = District::query()->create($request->all());
        return response()->json(['status' => true, 'message' => 'District created successfully', 'result' => $newDistrict]);
    }


    public function show($id): JsonResponse
    {
        $findDistrict = District::query()->findOrFail($id);
        return response()->json([
            'status' => true,
            'result' => $findDistrict
        ]);
    }


    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'district' => 'required|string',
            'region_id' => 'required|integer|exists:regions,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->messages()]);
        }
        $updateDistrict = District::query()->findOrFail($id);
        $updateDistrict->update($request->all());

        return response()->json(['status' => true, 'message' => 'District successfully updated', 'result' => $updateDistrict]);
    }


    public function destroy($id): JsonResponse
    {
        $findDistrict = District::query()->findOrFail($id);
        $findDistrict->delete();
        return response()->json(['status' => true, 'message' => 'District deleted']);
    }


    public function DistrictWithRegion($District_id): JsonResponse
    {
        $District = District::query()->findOrFail($District_id);
        $District->regions;
        return response()->json(['status' => true, 'result' => $District]);
    }
}
