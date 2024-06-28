<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionCheck
{

    public function handle(Request $request, Closure $next): Response
    {
        $userRole = $request->user()->role->name;

        $url = $request->getRequestUri();
        $baseurl = 'cms/public/';
        $trimmed_uri = str_replace($baseurl, '', $url);

        $permission = Permission::query()->where('route', $trimmed_uri/*$request->getRequestUri()*/)->first();
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
            'message' => 'access.denied'
        ], 403);
    }
}
