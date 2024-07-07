<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\Guard;
use Symfony\Component\HttpFoundation\Response;

class MobileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,... $roles)
    {
        // Assuming the token is sent in the Authorization header
        $request->bearerToken();
    
        // Attempt to authenticate using the token
        if (auth()->guard('sanctum')->check()) {
            // Get the authenticated user
            $user = auth()->guard('sanctum')->user();
            $user = User::find($user->id);
           // set auth user
           
            if (!in_array($user->role, $roles, true)) {
                return response()->json([
                    'ERROR' => 'Invalid or missing token'
                ], 401);
            }
            $user['resident'] = $user->resident;
            $request['user'] = $user;
            return $next($request);
        }
        else {
            // Token is invalid or not provided
            return response()->json([
                'ERROR' => 'Invalid or missing token'
            ], 401);
        }
    }
}