<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResidentialBuilding;
use App\Models\Servicing;
use Illuminate\Http\Request;

class ServicingController extends Controller
{
    // all
    public function all()
    {
        // buildings
        $servicings = Servicing::with('Building')->get();        
        return view('dashboard.admin.servicing.all', compact('servicings'));
    }
    // create
    public function create()
    {
        $buildings = ResidentialBuilding::all();
        return view('dashboard.admin.servicing.create', compact('buildings'));
    }
    // save
    public function save(Request $request)
    {
        // validate
        $request->validate([
            'type' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'name' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date',
            'status' => 'required|in:PENDING,STARTED,FINISHED',
            'building' => 'required|exists:residential_buildings,id'
        ]);

        // create
        $servicing = new Servicing();
        $servicing->type = $request->type;
        $servicing->cost = $request->cost;
        $servicing->name = $request->name;
        $servicing->start = $request->start;
        $servicing->end = $request->end;
        $servicing->status = $request->status;
        $servicing->residential_buildings_id = $request->building;
        $servicing->save();

        return redirect()->route('dashboard.admin.servicing.all');
    }

    // edit
    public function edit(Request $request,Servicing $servicing)
    {
        $buildings = ResidentialBuilding::all();
        return view('dashboard.admin.servicing.edit', compact('buildings','servicing'));
    }

    // update
    public function update(Request $request, Servicing $servicing)
    {
        // validate
        $request->validate([
            'type' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'name' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date',
            'status' => 'required|in:PENDING,STARTED,FINISHED',
            'building' => 'required|exists:residential_buildings,id'
        ]);

        // update Building
        $servicing->type = $request->type;
        $servicing->cost = $request->cost;
        $servicing->name = $request->name;
        $servicing->start = $request->start;
        $servicing->end = $request->end;
        $servicing->status = $request->status;
        $servicing->residential_buildings_id = $request->building;
        $servicing->save();

        // redirect
        return redirect()->route('dashboard.admin.servicing.all');
    }

    // delete
    public function delete(Request $request,Servicing $servicing)
    {
        $servicing->delete();
        return redirect()->route('dashboard.admin.servicing.all');
    }
}
