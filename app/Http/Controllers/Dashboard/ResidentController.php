<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Resident;
use App\Models\ResidentialBuilding;
use App\Models\Syndic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResidentController extends Controller
{
    // all
    public function all()
    {
        // residents
        // role 
        $role = auth()->user()->role;
        // if the role is admin
        if ($role == 'ADMIN') {
            $residents = Resident::all();
        } else {
            // only show the resident with same building as the syndic
            
            $cindikID= Syndic::where('user_id',auth()->user()->id)->first()->id;
            $building = ResidentialBuilding::where('syndic_id', $cindikID)->first();
            //id of cindik

            $residents = Resident::where('residential_buildings_id', $building->id)->get();

        }
        return view('dashboard.resident.all', compact('residents'));
    }
    // create
    public function create()
    {
        // buildings
        $role = auth()->user()->role;
        if ($role == 'ADMIN') {
            $buildings = ResidentialBuilding::all();

        } else {
            $cindikID= Syndic::where('user_id',auth()->user()->id)->first()->id;
            $buildings = ResidentialBuilding::where('syndic_id', $cindikID)->get();     
        }        
        return view('dashboard.resident.create', compact('buildings'));
    }
    // save
    public function save(Request $request)
    {
        // validate
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'apartment_number' => 'required|numeric',
            'monthly_contrubtion' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
            'building' => 'required|exists:residential_buildings,id'
        ]);

        // create user
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = UserRole::RESIDENT->value;
        $user->password = Hash::make($request->password);
        $user->save();

        // create resident
        $resident = new Resident();
        $resident->user_id = $user->id;
        $resident->residential_buildings_id = $request->building;
        $resident->apartment_number = $request->apartment_number;
        $resident->monthly_contrubtion = $request->monthly_contrubtion;
        $resident->save();
        // sending an email to the user that has the password
        $userPassword = $request->password;
        $userEmail = $request->email;
        $userName = $request->username;
        $userFullName = $request->first_name . ' ' . $request->last_name;
        // html then sending that in gmail
        Mail::send('emails.login-credentials', ['userFullName' => $userFullName, 'userEmail' => $userEmail, 'userPassword' => $userPassword], function ($message) use ($userEmail) {
            $message->to($userEmail);
        });

        // redirect
        return redirect()->route('dashboard.resident.all');
    }

    // edit
    public function edit(Request $request,Resident $resident)
    {
        // buildings
        $role = auth()->user()->role;
        if ($role == 'ADMIN') {
            $buildings = ResidentialBuilding::all();

        } else {
            $cindikID= Syndic::where('user_id',auth()->user()->id)->first()->id;
            $buildings = ResidentialBuilding::where('syndic_id', $cindikID)->get();     
           }
        return view('dashboard.resident.edit', compact('resident','buildings'));
    }

    // update
    public function update(Request $request, Resident $resident)
    {
        $user = $resident->user;
        // validate
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'apartment_number' => 'required|numeric',
            'monthly_contrubtion' => 'required|numeric',
            // 'username' => 'required|string|max:255|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'building' => 'required|exists:residential_buildings,id'
        ]);

        
        // update user
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        // $user->username = $request->username;
        $user->email = $request->email;


        // if password given
        if($request->password){
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            // set password
            $user->password = Hash::make($request->password);
        }
        // save
        $user->save();

        // update resident
        $resident->residential_buildings_id = $request->building;
        $resident->apartment_number = $request->apartment_number;
        $resident->monthly_contrubtion = $request->monthly_contrubtion;
        $resident->save();
        // redirect
        return redirect()->route('dashboard.resident.all');
    }

    // delete
    public function delete(Request $request, Resident $resident)
    {
        $userId = $resident->user_id;
        $resident->delete();
        User::destroy($userId);
        return redirect()->route('dashboard.resident.all');
    }
}
