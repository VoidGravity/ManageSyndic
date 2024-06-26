<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\ResidentialBuilding;
use App\Models\Syndic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResidentialbuildingController extends Controller
{
    // all
    public function all()
    {
        // buildings
        $buildings = ResidentialBuilding::all();
        
        return view('dashboard.admin.building.all', compact('buildings'));
    }
    // create
    public function create()
    {
        $syndics = Syndic::all();
        return view('dashboard.admin.building.create', compact('syndics'));
    }
    // save
    public function save(Request $request)
    {
        // validate
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'syndic' => 'required|exists:syndics,id'
        ]);

        // add Building
        $building = new ResidentialBuilding();
        $building->name = $request->name;
        $building->number = $request->number;
        $building->address = $request->address;
        $building->syndic_id = $request->syndic;
        $building->save();
        // redirect
        return redirect()->route('dashboard.admin.building.all');
    }

    // edit
    public function edit(Request $request, $building)
    {
        $building = ResidentialBuilding::find($building);
        $syndics = Syndic::all();
        return view('dashboard.admin.building.edit', compact('building','syndics'));
    }

    // update
    public function update(Request $request, $building)
    {
        $building = ResidentialBuilding::find($building);
        // validate
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'syndic' => 'required|exists:syndics,id'
        ]);

        // update Building
        $building->name = $request->name;
        $building->number = $request->number;
        $building->address = $request->address;
        $building->syndic_id = $request->syndic;
        $building->save();

        // redirect
        return redirect()->route('dashboard.admin.building.all');
    }

    // delete
    public function delete(Request $request, $building)
    {
        $building = ResidentialBuilding::find($building);
        $building->delete();
        return redirect()->route('dashboard.admin.building.all');
    }
    
}
