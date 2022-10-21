<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StampController extends Controller
{
    public function stamp()
    {
        $user = Auth::user();
        return view('stamp', ['user' => $user]);
    }

}


