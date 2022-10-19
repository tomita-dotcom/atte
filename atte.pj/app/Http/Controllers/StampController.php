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


// public function stamp()
//     {
//         $user = Auth::user();

//         $user_id = Auth::id();
//         $date =Carbon::today()->format('Y-m-d');
//         $work = Work::where('user_id',$user_id)->where('date',$date)->first();

//         $display_element = [
//             'user' => $user,
//             'work' => $work,       
//         ];

//         return view('stamp', $display_element);
//         // return view('stamp', ['user' => $user]);
//     }