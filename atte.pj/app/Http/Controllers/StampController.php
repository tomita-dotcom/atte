<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;


class StampController extends Controller
{
    public function stamp()
    {
        $user = Auth::user();
        return view('stamp',['user' => $user]);
    }
}
