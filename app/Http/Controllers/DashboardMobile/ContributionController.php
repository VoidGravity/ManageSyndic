<?php

namespace App\Http\Controllers\DashboardMobile;

use App\Http\Controllers\Controller;
use App\Models\Contrubtion;
use App\Models\Resident;
use App\Models\ResidentialBuilding;
use App\Models\Syndic;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

class ContributionController extends Controller
{
    // all
    public function all()
    {
        // buildings
        // checking the auth user role 
        $role = auth()->user()->role;
        // look in the cindik for one with the id user 
        
        if ($role == 'ADMIN') {
            $contributions = Contrubtion::with('resident','syndic')->get(); 
        }elseif($role == 'SYNDIC'){
            $cindik = Syndic::where('user_id',auth()->user()->id)->first();
            $contributions = Contrubtion::with('resident','syndic')->where('syndics_id',$cindik->id)->get(); 
            // dd(auth()->user()->id);
            // dd(Contrubtion::with('resident','syndic')->where('syndics_id',2)->get());
        }else{
            //dd user auth id 
            $resident = Resident::where('user_id',auth()->user()->id)->first();
            $residentialBuilding = ResidentialBuilding::where('id',$resident->residential_buildings_id)->first();
            $cindik = Syndic::where('id',$residentialBuilding->syndic_id)->first();
            $contributions = Contrubtion::with('resident','syndic')->where('syndics_id',$cindik->id)->get(); 
        }
        return response()->json($contributions);
    }
    // create
    public function create()
    {
         // checking the auth user role 
        $role = auth()->user()->role;
        if ($role == 'ADMIN') {
            
        // residents
        $residents = Resident::with('user')->get();
        // syndics
        $syndics = Syndic::with('user')->get();
        }else{
            $syndics = Syndic::with('user')->where('user_id',auth()->user()->id)->get();
        $residents = Resident::with('user')->get();



        }
        return response()->json(compact('residents', 'syndics'));
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
            // get the user id that has cindik id from request
            // $user = Syndic::find($request->syndic[$key])->user_id;



            $contribution->save();
        }
        
        return response()->json(['message' => 'Contributions saved successfully']);
    }

    // edit
    public function edit(Request $request, Contrubtion $contrubtion)
    {
        // checking the auth user role 
        $role = auth()->user()->role;
        // finding the residential building of the auth user, getting the id
        $syndicResidentialBuildingId = ResidentialBuilding::where('syndic_id', auth()->user()->id)->first()->id;

        if ($role == 'ADMIN') {
            // residents
            $residents = Resident::all();
            // syndics
            $syndics = Syndic::all();
        } else {
            $residents = Resident::where('residential_buildings_id', $syndicResidentialBuildingId)->get();
            $syndics = Syndic::where('user_id', auth()->user()->id)->get();
        }

        return response()->json(compact('syndics', 'residents', 'contrubtion'));
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

        // update
        $contrubtion->update([
            'price' => $request->price,
            'date' => $request->date,
            'residents_id' => $request->resident,
            'syndics_id' => $request->syndic
        ]);

        // return json
        return response()->json(['message' => 'Contribution updated successfully']);
    }

    // delete
    public function delete(Request $request, Contrubtion $contrubtion)
    {
        $contrubtion->delete();
        return response()->json(['message' => 'Contribution deleted successfully']);
    }
    public function exportPDF(Request $request,$id)
    {
        
        $data = Contrubtion::find($id);

        // dd($data);
        // $dompdf = new Dompdf();
        $options = new Options();

        $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parsing

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('dashboard.contribution.pdf', compact('data')));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream();




        
    }


}