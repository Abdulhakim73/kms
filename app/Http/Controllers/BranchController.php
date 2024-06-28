<?php

namespace App\Http\Controllers;

use App\Models\BranchUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    public function index(): Collection
    {
        return BranchUser::all();
    }

    public function show($id): JsonResponse
    {
        $branch = BranchUser::query()->findOrFail($id);
        return response()->json(['error' => true, 'data' => $branch]);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'branch' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->messages()]);
        }

        $branch = new BranchUser();
        $branch->branch_name = $request['branch'];
        $branch->save();
        return response()->json(['error' => true, 'message' => 'New Branch created', 'data' => $branch]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'branch' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->messages()]);
        }

        $branch = BranchUser::query()->findOrFail($id);
        $branch->branch_name = $request['branch'];
        $branch->update();
        return response()->json(['error' => true, 'message' => 'Branch updated', 'data' => $branch]);
    }

    public function destroy($id): JsonResponse
    {
        $branch = BranchUser::query()->findOrFail($id);
        $branch->delete();
        return response()->json(['error' => true, 'message' => 'Branch deleted']);
    }
}
