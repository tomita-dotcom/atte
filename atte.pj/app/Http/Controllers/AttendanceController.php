<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
	

class AttendanceController extends Controller
{
    public function attendance()
    {
        return view('attendance');
    }

    public function other_day(Request $request)
    {
        $request_date = $request['display_date'];
        Log::alert('$request_dateの出力調査', ['$request_date' => $request_date]);

        $select_day = $request['select_day'];
        Log::alert('$select_dayの出力調査', ['$select_day' => $select_day]);//back,nextどちらかは取れている

        if($select_day == "back"){
            // $request_dateを基準にした1日前の日付を$display_dateに格納
            $display_date = date("Y-m-d", strtotime("$request_date -1 day"));
        }else if($select_day == "next"){
            // $request_dateを基準にした1日後の日付を$display_dateに格納
            $display_date = date("Y-m-d", strtotime("$request_date +1 day"));
        }

    }
}
