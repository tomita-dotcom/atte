<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Work;
use App\Models\Rest;
use App\Http\Requests\LoginRequest;
	

class AttendanceController extends Controller
{
    public function attendance(Request $request)
    {
        
        if($request->old('display_date')){  
            $display_date = $request->old('display_date');
        }else{
            $display_date =Carbon::today()->format('Y-m-d');
        }
    
        $works = Work::where('date',$display_date)->Paginate(5);
        $works->appends(compact('display_date')); 

        $list_element = [
            'display_date' => $display_date,
            'works' => $works,       
        ];
        
        return view('attendance', $list_element);
    }
    

    public function other_day(Request $request)
    {
        $request_date = $request['display_date'];
        $select_day = $request['select_day'];

        if($select_day == "back"){
            // $request_dateを基準にした1日前の日付を$display_dateに格納
            $display_date = date("Y-m-d", strtotime("$request_date -1 day"));
        }else if($select_day == "next"){
            // $request_dateを基準にした1日後の日付を$display_dateに格納
            $display_date = date("Y-m-d", strtotime("$request_date +1 day"));
        }
        

        return redirect('/attendance')->withInput(['display_date' => $display_date]);

    }

    
}
