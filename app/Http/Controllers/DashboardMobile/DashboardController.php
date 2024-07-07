<?php

namespace App\Http\Controllers\DashboardMobile;

use App\Http\Controllers\Controller;
use App\Models\Contrubtion;
use App\Models\ResidentialBuilding;
use App\Models\Servicing;
use App\Models\Syndic;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // all
    public function all(Request $request)
    {
        $contributions = Contrubtion::where('residents_id', $request->user->resident->id)->count();
        $LastContributions = Contrubtion::with(['Resident.user','Syndic.user'])->where('residents_id', $request->user->resident->id)->orderBy('id','desc')->limit(6)->get();
        $servicings = Servicing::where('residential_buildings_id', $request->user->resident->residential_buildings_id)->count();

        return response()->json([
            'contributions' => $contributions,
            'servicings' => $servicings,
            'LastContributions' => $LastContributions
        ]);
    }
}
