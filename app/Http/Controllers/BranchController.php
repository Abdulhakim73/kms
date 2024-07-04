<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Branches;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    public function index(): Collection
    {
        return Branch::all();
    }

    public function show($id): JsonResponse
    {
        $findBranch = Branch::query()->findOrFail($id);
        return response()->json(['success' => true, 'result' => $findBranch]);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'branch' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->messages()]);
        }
        $newBranch = Branch::query()->create($request->all());
        return response()->json(['success' => true, 'message' => 'New Branch created', 'result' => $newBranch]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'branch' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->messages()]);
        }
        $updateBranch = Branch::query()->findOrFail($id);
        $updateBranch->update($request->all());
        return response()->json(['success' => true, 'message' => 'Branch updated', 'result' => $updateBranch]);
    }

    public function destroy($id): JsonResponse
    {
        $branch = Branch::query()->findOrFail($id);
        $branch->delete();
        return response()->json(['error' => true, 'message' => 'Branch deleted']);
    }
}
