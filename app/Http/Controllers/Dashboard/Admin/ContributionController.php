<?php

namespace App\Http\Controllers\Dashboard\Admin;

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
        return view('dashboard.admin.contribution.all', compact('contributions'));
    }
    // create
    public function create()
    {
        // residents
        $residents = Resident::all();
        // syndics
        $syndics = Syndic::all();
        return view('dashboard.admin.contribution.create', compact('residents','syndics'));
    }
    // save
    public function save(Request $request)
    {
        // validate
        $request->validate([
            'price' => 'required|numeric',
            'date' => 'required|date',
            'resident' => 'required|exists:residents,id',
            'syndic' => 'required|exists:syndics,id'
        ]);

        // create
        $contribution = new Contrubtion();
        $contribution->price = $request->price;
        $contribution->date = $request->date;
        $contribution->residents_id = $request->resident;
        $contribution->syndics_id = $request->syndic;
        $contribution->save();
        
        return redirect()->route('dashboard.admin.contribution.all');
    }

    // edit
    public function edit(Request $request,Contrubtion $contrubtion)
    {
        // residents
        $residents = Resident::all();
        // syndics
        $syndics = Syndic::all();
        return view('dashboard.admin.contribution.edit', compact('syndics','residents','contrubtion'));
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
        return redirect()->route('dashboard.admin.contribution.all');
    }

    // delete
    public function delete(Request $request,Contrubtion $contrubtion)
    {
        $contrubtion->delete();
        return redirect()->route('dashboard.admin.contribution.all');
    }
}