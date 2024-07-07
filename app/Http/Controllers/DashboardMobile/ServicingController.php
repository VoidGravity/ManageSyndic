<?php

namespace App\Http\Controllers\DashboardMobile;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\ResidentialBuilding;
use App\Models\Servicing;
use Illuminate\Http\Request;

class ServicingController extends Controller
{
    // all
    public function all(Request $request)    {
        $user = $request->user;
        $servicings = Servicing::with('Building.syndic')->where('residential_buildings_id', $user->resident->residential_buildings_id)->get();
        return response()->json($servicings);
    }
}
