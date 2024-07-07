<?php

namespace App\Http\Controllers\DashboardMobile;

use App\Http\Controllers\Controller;
use App\Models\Contrubtion;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    public function all(Request $request)
    {
        $contributions = Contrubtion::with(['Resident.user', 'Syndic.user'])->where('syndics_id', $request->user->id)->orderBy('id', 'desc')->get();

        return response()->json($contributions);
    }

}