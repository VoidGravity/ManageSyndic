<?php

namespace App\Http\Controllers\DashboardMobile;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Syndic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SyndicController extends Controller
{
    // all
    public function all()
    {
        // syndics
        $syndics = Syndic::all();
        return response()->json($syndics);
    }
    // create
    public function create()
    {
        return response()->json();
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
            'password' => 'required|string|min:8|confirmed',
        ]);

        // create user
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = UserRole::SYNDIC->value;
        $user->password = Hash::make($request->password);
        $user->save();

        // create syndic
        $syndic = new Syndic();
        $syndic->user_id = $user->id;
        $syndic->save();
        // sending an email to the user that has the password

        $userPassword = $request->password;
        $userEmail = $request->email;
        $userName = $request->username;
        $userFullName = $request->first_name . ' ' . $request->last_name;
        // html then sending that in gmail
        Mail::send('emails.login-credentials', ['userFullName' => $userFullName, 'userEmail' => $userEmail, 'userPassword' => $userPassword], function ($message) use ($userEmail) {
            $message->to($userEmail);
            $message->subject('Login Credentials');
        });

        // redirect
        return response()->json(['message' => 'Syndic added successfully']);
    }

    // edit
    public function edit(Request $request,Syndic $syndic)
    {
        return response()->json(compact('syndic'));
    }

    // update
    public function update(Request $request, Syndic $syndic)
    {
        $user = $syndic->user;
        // validate
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            // 'username' => 'required|string|max:255|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
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

        // redirect
        return response()->json(['message' => 'Syndic updates successfully']);
    }

    // delete
    public function delete(Request $request, Syndic $syndic)
    {
        $userId = $syndic->user_id;
        $syndic->delete();
        User::destroy($userId);
        return response()->json(['message' => 'Syndic deleted successfully']);
    }
}
