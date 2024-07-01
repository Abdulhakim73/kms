<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class PermissionCheck
{

    public function handle(Request $request, Closure $next): Response
    {
        $userRole = $request->user()->role->name;
        $controllerAction = Route::currentRouteAction();
        list($controller, $action) = explode('@', class_basename($controllerAction));

        $permission = Permission::query()->where(['controller' => $controller, 'method' => $action])->first();
        if ($permission) {
            $roles = $permission->roles;

            if ($userRole === 'admin')
                return $next($request);

            if (in_array($userRole, $roles)) {
                return $next($request);
            }
            return response()->json([
                'error' => true,
                'message' => 'access.denied'
            ], 403);
        }
        return response()->json([
            'error' => true,
            'message' => 'route not found'
        ], 403);
    }
}
