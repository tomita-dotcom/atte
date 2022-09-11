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
        $work_start_time = Work::where('user_id',$user_id)->where('date',$date)->get('start_time');
        $work_end_time = Work::where('user_id',$user_id)->where('date',$date)->get('end_time');
        $rest_end_time = Rest::newest()->get('end_time');

        //当日の勤務開始データと1件前のデータ内に休憩終了データがあり、当日の勤務終了データがない場合は休憩開始データを作成
        //上記の条件に該当しない場合はそのまま打刻ページへ
        if(isset($work_start_time) && isset($rest_end_time) && $work_end_time == null){
            Rest::create([
                'work_id' => Work::newest()->get('id'),
                'start_time' => Carbon::now()->format('H:i:s')
            ]);
        }

        return redirect('/');
    }

    //休憩終了のアクション
    public function end(Request $request)
    {
        //当日の勤務開始と勤務終了、最新の休憩データの検索
        $user_id = Auth::id();
        $date = Carbon::today()->format('Y-m-d');
        $work_start_time = Work::where('user_id',$user_id)->where('date',$date)->get('start_time');
        $work_end_time = Work::where('user_id',$user_id)->where('date',$date)->get('end_time');
        $rest_end_time = Rest::newest()->get('end_time');

        //当日の勤務開始データがあり、当日の勤務終了データと最新の休憩開始データにおいてend_timeがnullだった場合は休憩終了データを作成
        //上記の条件に該当しない場合はそのまま打刻ページへ
        if(isset($work_start_time) && $work_end_time == null && $rest_end_time == null){
            Rest::create([
                'work_id' => Work::newest()->get('id'),
                'start_time' => Carbon::now()->format('H:i:s')
            ]);
        }

        return redirect('/');
    }
}
