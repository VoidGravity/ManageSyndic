<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contrubtion;
use App\Models\Resident;
use App\Models\Syndic;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    // all
    public function all()
    {
        // buildings
        $contributions = Contrubtion::with('resident','syndic')->get();  
        return view('dashboard.contribution.all', compact('contributions'));
    }
    // create
    public function create()
    {
        // residents
        $residents = Resident::with('user')->get();
        // syndics
        $syndics = Syndic::with('user')->get();
        return view('dashboard.contribution.create', compact('residents','syndics'));
    }
    // save
    public function save(Request $request)
    {
        // validate
        $request->validate([
            'price.*' => 'required|numeric',
            'date.*' => 'required|date',
            'resident.*' => 'required|exists:residents,id',
            'syndic.*' => 'required|exists:syndics,id'
        ]);
        
        foreach($request->price as $key => $price){
            // create
            $contribution = new Contrubtion();
            $contribution->price = $price;
            $contribution->date = $request->date[$key];
            $contribution->residents_id = $request->resident[$key];
            $contribution->syndics_id = $request->syndic[$key];
            $contribution->save();
        }
        
        return redirect()->route('dashboard.contribution.all');
    }

    // edit
    public function edit(Request $request,Contrubtion $contrubtion)
    {
        // residents
        $residents = Resident::all();
        // syndics
        $syndics = Syndic::all();
        return view('dashboard.contribution.edit', compact('syndics','residents','contrubtion'));
    }

    // update
    public function update(Request $request, Contrubtion $contrubtion)
    {
         // validate
         $request->validate([
            'price' => 'required|numeric',
            'date' => 'required|date',
            'resident' => 'required|exists:residents,id',
            'syndic' => 'required|exists:syndics,id'
        ]);

        // create
        $contrubtion->price = $request->price;
        $contrubtion->date = $request->date;
        $contrubtion->residents_id = $request->resident;
        $contrubtion->syndics_id = $request->syndic;
        $contrubtion->save();

        // redirect
        return redirect()->route('dashboard.contribution.all');
    }

    // delete
    public function delete(Request $request,Contrubtion $contrubtion)
    {
        $contrubtion->delete();
        return redirect()->route('dashboard.contribution.all');
    }
}