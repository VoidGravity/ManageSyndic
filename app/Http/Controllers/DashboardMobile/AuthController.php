<?php

namespace App\Http\Controllers\DashboardMobile;

use App\Http\Controllers\Controller;
use App\Models\Contrubtion;
use App\Models\ResidentialBuilding;
use App\Models\Servicing;
use App\Models\Syndic;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'ERROR' => 'Invalid login details'
            ], 401);
        }

        $user = auth()->user();

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('token')->plainTextToken
        ]);
    }


}
