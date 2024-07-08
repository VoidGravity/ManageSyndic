<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ResidentialBuilding;
use App\Models\Servicing;
use App\Models\Syndic;
use Illuminate\Http\Request;

class ServicingController extends Controller
{
    // all
    public function all()
    {
        // buildings
        // checking the auth user role 
        $role = auth()->user()->role;
        // if building exist 
        if ($role == 'ADMIN') {
            
            $servicings = Servicing::with('Building')->get(); 
            // find resedential building id with same cyndik id
        }elseif($role == 'SYNDIC'){
            // only bring the building that has sam ecyndic id 
            $syndic = Syndic::where('user_id',auth()->user()->id)->first();
            $building = ResidentialBuilding::where('syndic_id',$syndic->id)->first();
            if ($building) {
            $building_id = $building->id;
            } else {
                $building_id = 0;
            }
            $servicings = Servicing::with('Building')->where('residential_buildings_id',$building_id)->get();
            
        }else{
            // resident where id is the same as loged in , bring resident building id
            $building_id = auth()->user()->resident->residential_buildings_id;
            
            $servicings = Servicing::with('Building')->where('residential_buildings_id',$building_id)->get();

        }   
        return view('dashboard.servicing.all', compact('servicings'));
    }
    // create
    public function create()
    {
        if (auth()->user()->role == 'ADMIN') {
            $buildings = ResidentialBuilding::all();
        }else{
            $syndic = Syndic::where('user_id',auth()->user()->id)->first();
            $building = ResidentialBuilding::where('syndic_id',$syndic->id)->first();
            if (!$building) {
                return redirect()->route('dashboard.servicing.all')->with('error','You have no building');  
            }
            $buildings = ResidentialBuilding::where('id',$building->id)->get();
        }
        return view('dashboard.servicing.create', compact('buildings'));
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

        return redirect()->route('dashboard.servicing.all');
    }

    // edit
    public function edit(Request $request,Servicing $servicing)
    {
        if (auth()->user()->role == 'ADMIN') {
            $buildings = ResidentialBuilding::all();
        }else{
            $syndic = Syndic::where('user_id',auth()->user()->id)->first();
            $building = ResidentialBuilding::where('syndic_id',$syndic->id)->first();
            if (!$building) {
                return redirect()->route('dashboard.servicing.all')->with('error','You have no building');  
            }
            $buildings = ResidentialBuilding::where('id',$building->id)->get();
        }

        return view('dashboard.servicing.edit', compact('buildings','servicing'));
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
        return redirect()->route('dashboard.servicing.all');
    }

    // delete
    public function delete(Request $request,Servicing $servicing)
    {
        $servicing->delete();
        return redirect()->route('dashboard.servicing.all');
    }
}
