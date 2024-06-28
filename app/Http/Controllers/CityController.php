<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{

    public function index(): Collection
    {
        return City::all();
    }


    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'city' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->messages()]);
        }

        $newCity = new City();
        $newCity->name = $request->get('city');
        $newCity->save();
        return response()->json(['status' => true, 'message' => 'City created successfully', 'result' => $newCity]);
    }


    public function show($id): JsonResponse
    {
        $findCity = City::query()->findOrFail($id);
        return response()->json([
            'status' => true,
            'result' => $findCity
        ]);
    }


    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'city' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->messages()]);
        }
        $findCity = City::query()->findOrFail($id);

        $findCity->name = $request->city;
        $findCity->update();

        return response()->json(['status' => true, 'message' => 'City successfully updated', 'result' => $findCity]);
    }


    public function destroy($id): JsonResponse
    {
        $findCity = City::query()->findOrFail($id);
        $findCity->delete();
        return response()->json(['status' => true, 'message' => 'City deleted']);
    }


    public function CityWithRegion($city_id): JsonResponse
    {
        $city = City::query()->findOrFail($city_id);
        $city->regions;
        return response()->json(['status' => true, 'result' => $city]);
    }
}
