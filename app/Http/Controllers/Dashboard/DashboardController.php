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

        return view('dashboard.home', compact('residentialBuildings', 'residents', 'syndics', 'contributions', 'servicings', 'contributionPriceTotal', 'servicingPriceTotal', 'contributionPriceTotalForMonth', 'servicingPriceTotalForMonth'));
    }
}
