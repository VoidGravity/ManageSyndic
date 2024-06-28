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
    public function all()
    {
        //role 
        $role = auth()->user()->role;
        if ($role == 'ADMIN') {
            $syndics = Syndic::all();
        

        // RESIDENTIAL BUILDINGS
        $residentialBuildings = ResidentialBuilding::count();
        // RESIDENTS
        $residents = ResidentialBuilding::count();
        // SYNDICS
        $syndics = Syndic::count();
        // CONTRUBTIONS
        $contributions = Contrubtion::count();
        // SERVICINGS
        $servicings = Servicing::count();
        // contribution price total
        $contributionPriceTotal = Contrubtion::sum('price');
        // contribution price total for each month
        $contributionPriceTotalForMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $contributionPriceTotalForMonth[sprintf('%02d', $i)] = Contrubtion::whereMonth('date', $i)->sum('price');
        }
        // servicing price total for each month
        $servicingPriceTotalForMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $servicingPriceTotalForMonth[sprintf('%02d', $i)] = Servicing::whereMonth('start', $i)->sum('cost');
        }
        // servicing price total
        $servicingPriceTotal = Servicing::sum('cost');
    }elseif($role == 'SYNDIC'){
        $syndics = Syndic::where('user_id',auth()->user()->id)->get();
        $residentialBuildings = ResidentialBuilding::where('syndic_id',auth()->user()->id)->count();
        $residents = ResidentialBuilding::where('syndic_id',auth()->user()->id)->count();
        $syndics = Syndic::where('user_id',auth()->user()->id)->count();
        $contributions = Contrubtion::where('syndics_id',auth()->user()->id)->count();
        $servicings = Servicing::where('residential_buildings_id',auth()->user()->id)->count();
        $contributionPriceTotal = Contrubtion::where('syndics_id',auth()->user()->id)->sum('price');
        $contributionPriceTotalForMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $contributionPriceTotalForMonth[sprintf('%02d', $i)] = Contrubtion::where('syndics_id',auth()->user()->id)->whereMonth('date', $i)->sum('price');
        }
        $servicingPriceTotalForMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $servicingPriceTotalForMonth[sprintf('%02d', $i)] = Servicing::where('residential_buildings_id',auth()->user()->id)->whereMonth('start', $i)->sum('cost');
        }
        $servicingPriceTotal = Servicing::where('residential_buildings_id',auth()->user()->id)->sum('cost');
    }else{
        $syndics = Syndic::where('user_id',auth()->user()->id)->get();
        $residentialBuildings = ResidentialBuilding::where('syndic_id',auth()->user()->id)->count();
        $residents = ResidentialBuilding::where('syndic_id',auth()->user()->id)->count();
        $syndics = Syndic::where('user_id',auth()->user()->id)->count();
        $contributions = Contrubtion::where('syndics_id',auth()->user()->id)->count();
        $servicings = Servicing::where('residential_buildings_id',auth()->user()->id)->count();
        $contributionPriceTotal = Contrubtion::where('syndics_id',auth()->user()->id)->sum('price');
        $contributionPriceTotalForMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $contributionPriceTotalForMonth[sprintf('%02d', $i)] = Contrubtion::where('syndics_id',auth()->user()->id)->whereMonth('date', $i)->sum('price');
        }
        $servicingPriceTotalForMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $servicingPriceTotalForMonth[sprintf('%02d', $i)] = Servicing::where('residential_buildings_id',auth()->user()->id)->whereMonth('start', $i)->sum('cost');
        }
        $servicingPriceTotal = Servicing::where('residential_buildings_id',auth()->user()->id)->sum('cost');
    }
    

    

        return response()->json([
            'residentialBuildings' => $residentialBuildings,
            'residents' => $residents,
            'syndics' => $syndics,
            'contributions' => $contributions,
            'servicings' => $servicings,
            'contributionPriceTotal' => $contributionPriceTotal,
            'servicingPriceTotal' => $servicingPriceTotal,
            'contributionPriceTotalForMonth' => $contributionPriceTotalForMonth,
            'servicingPriceTotalForMonth' => $servicingPriceTotalForMonth
        ]);
    }
}
