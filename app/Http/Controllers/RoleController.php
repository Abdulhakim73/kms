<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(): Collection
    {
        return Role::all();
    }

    public function show(int $id): JsonResponse
    {
        $findRole = Role::query()->findOrFail($id);
        return response()->json(['status' => true,
            'result' => $findRole]);
    }

}
