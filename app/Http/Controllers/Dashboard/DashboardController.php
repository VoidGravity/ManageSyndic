<?php

namespace App\Http\Controllers\Dashboard;

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
        $syndic = Syndic::where('user_id',auth()->user()->id)->first();
        // dd($syndic->id);
        $residentialBuildings = ResidentialBuilding::where('syndic_id',$syndic->id)->count();
        $residents = ResidentialBuilding::where('syndic_id',$syndic->id)->count();
        $syndics = Syndic::where('user_id',$syndic->id)->count();
        $contributions = Contrubtion::where('syndics_id',$syndic->id)->count();
        //building whrer syndic id is the same
        $building = ResidentialBuilding::where('syndic_id',$syndic->id)->first();
        $servicings = Servicing::where('residential_buildings_id',$building->id)->count();
        $contributionPriceTotal = Contrubtion::where('syndics_id',$syndic->id)->sum('price');
        $contributionPriceTotalForMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $contributionPriceTotalForMonth[sprintf('%02d', $i)] = Contrubtion::where('syndics_id',$syndic->id)->whereMonth('date', $i)->sum('price');
        }
        $servicingPriceTotalForMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $servicingPriceTotalForMonth[sprintf('%02d', $i)] = Servicing::where('residential_buildings_id',$syndic->id)->whereMonth('start', $i)->sum('cost');
        }
        $servicingPriceTotal = Servicing::where('residential_buildings_id',$syndic->id)->sum('cost');
    }else{
       // for user you don't have to show anything that needs syndic exept contribution and servicing 
       // the auth user is not syndic instea dit is a resident so you have to find contributions and servicing using other methods 
         $residentialBuildings = ResidentialBuilding::where('id',auth()->user()->resident->residential_buildings_id)->count();
        $residents = ResidentialBuilding::where('id',auth()->user()->resident->residential_buildings_id)->count();
        $syndics = Syndic::where('id',auth()->user()->resident->residential_buildings_id)->count();
        $contributions = Contrubtion::where('residents_id',auth()->user()->resident->id)->count();
        $building = ResidentialBuilding::where('id',auth()->user()->resident->residential_buildings_id)->first();
        $servicings = Servicing::where('residential_buildings_id',$building->id)->count();
        $contributionPriceTotal = Contrubtion::where('residents_id',auth()->user()->resident->id)->sum('price');
        $contributionPriceTotalForMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $contributionPriceTotalForMonth[sprintf('%02d', $i)] = Contrubtion::where('residents_id',auth()->user()->resident->id)->whereMonth('date', $i)->sum('price');
        }
        $servicingPriceTotalForMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $servicingPriceTotalForMonth[sprintf('%02d', $i)] = Servicing::where('residential_buildings_id',$building->id)->whereMonth('start', $i)->sum('cost');
        }
        $servicingPriceTotal = Servicing::where('residential_buildings_id',$building->id)->sum('cost');
        
    }
    

    

        return view('dashboard.home', compact('residentialBuildings', 'residents', 'syndics', 'contributions', 'servicings', 'contributionPriceTotal', 'servicingPriceTotal', 'contributionPriceTotalForMonth', 'servicingPriceTotalForMonth'));
    }
}
