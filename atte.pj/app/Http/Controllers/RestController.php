<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Work;
use App\Models\Rest;

class RestController extends Controller
{
    //休憩開始のアクション
    public function start(Request $request)
    {
        //当日の勤務開始と勤務終了、最新の休憩終了データの検索
        $user_id = Auth::id();
        $date = Carbon::today()->format('Y-m-d');
        $work = Work::where('user_id',$user_id)->where('date',$date)->first();
        
        
        if($work){
            $work_id = $work->id;
            $work_start_time = $work->start_time;
            $work_end_time = $work->end_time;
            $rest = Rest::where('work_id',$work_id)->first();     
        }else{
            return redirect('/');
        }

        /*if($rest){
            $rest_end_time = $rest->end_time;
        }*/


        //当日の勤務開始データと1件前のデータ内に休憩終了データがあり、当日の勤務終了データがない場合は休憩開始データを作成
        //上記の条件に該当しない場合はそのまま打刻ページへ

        /*1休憩データが全くなく、当日の勤務開始データがあり、当日の勤務終了データがない場合は休憩開始データを作成。2休憩データがある場合、当日の勤務開始データと1件前のデータ内に休憩終了データがあり、当日の勤務終了データがなければ休憩開始データを作成*/

        if(!$rest){
            if(!$work_start_time||$work_end_time){
                return redirect('/');
            }else{
                Rest::create([
                'work_id' => $work_id,
                'start_time' => Carbon::now()->format('H:i:s')
            ]);
            return redirect('/');
            }
        }else{
            $rest_end_time = $rest->end_time;
            if(!$work_start_time||!$rest_end_time ||$work_end_time){
                return redirect('/');
            }else{
                Rest::create([
                'work_id' => $work_id,
                'start_time' => Carbon::now()->format('H:i:s')
            ]);
            return redirect('/');
            }
        }
    }

    //休憩終了のアクション
    public function end(Request $request)
    {
        //当日の勤務開始と勤務終了、最新の休憩データの検索
        $user_id = Auth::id();
        $date = Carbon::today()->format('Y-m-d');
        $work = Work::where('user_id',$user_id)->where('date',$date)->first();
        $rest = Rest::latest()->first();

        if($work && $rest){
            $work_id = $work->id;
            $work_start_time = $work->start_time;
            $work_end_time = $work->end_time;
            $rest_start_time = $rest->start_time;
            $rest_end_time = $rest->end_time;
        }else{
            return redirect('/');
        }

        //当日の勤務開始データがあり、当日の勤務終了データと最新の休憩開始データにおいてend_timeがnullだった場合は休憩終了データを作成
        //上記の条件に該当しない場合はそのまま打刻ページへ
        if(!$work_start_time || $work_end_time ||$rest_end_time ){
            return redirect('/');
        }else{
            $end_time = Carbon::now()->format('H:i:s');
            Rest::where('work_id',$work_id)->where('end_time',null)->update(['end_time' => $end_time]);
            return redirect('/');
        }

        
    }
}
