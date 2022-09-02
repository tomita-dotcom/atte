<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;


class StampController extends Controller
{
    public function stamp()
    {
        $user = User::all();
        return view('stamp',['user' => $user]);
    }
}
