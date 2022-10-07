<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Work;

class WorkController extends Controller
{
    //勤務開始のアクション
    public function start(Request $request)
    {
        //当日のstart_timeデータの検索
        $user_id = Auth::id();
        $date =Carbon::today()->format('Y-m-d');
        $work = Work::where('user_id',$user_id)->where('date',$date)->first();
        
        //当日のstart_timeデータがあれば打刻ページへ、なければデータを作成して打刻ページへ
        if($work){
            return redirect('/');
        }else{
            Work::create([
                'user_id' => $user_id,
                'date' => Carbon::today()->format('Y-m-d'),
                'start_time' => Carbon::now()->format('H:i:s')
            ]);

            return redirect('/');
        }
    }



    //勤務終了のアクション
    public function end(Request $request)
    {
        //当日のend_timeデータの検索
        $user_id = Auth::id();
        $date =Carbon::today()->format('Y-m-d');
        $work = Work::where('user_id',$user_id)->where('date',$date)->first();

        if($work){
            $start_time = $work->start_time;
            $end_time = $work->end_time;
        }else{
            return redirect('/');
        }

        //当日のstart_timeデータがある、かつ当日のend_timeがない場合はデータを更新。
        //勤務開始から日を跨いだら、勤務開始日の23時59分に勤務終了の打刻
        //上記の条件があてはまらなければ、そのまま打刻ページへ


        if($end_time){
            return redirect('/');
        }else{
            $end_time = Carbon::now()->format('H:i:s');
            Work::where('user_id',$user_id)->where('date',$date)->update([
                'end_time' => $end_time
            ]);
            return redirect('/');
        }
        
    }

}
