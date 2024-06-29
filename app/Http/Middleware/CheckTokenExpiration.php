<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckTokenExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $user = Auth::guard('sanctum')->user();


        if ($user) {
            $token = $user->tokens()->orderBy('created_at', 'desc')->first();

            if ($token) {
                //is expired or not
                $check = Carbon::now() > $token->expires_at;
                if ($check) {
                    return response()->json(['status' => false, 'message' => 'Token expired'], 401);
                }
                //good
                return $next($request);
            }
            return response()->json(['status' => false, 'message' => 'No token found.'], 404);
        }
        return response()->json(['status' => true, 'message' => 'User not found'], 404);

    }
}
