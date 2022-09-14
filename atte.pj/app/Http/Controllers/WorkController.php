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
        $start_time = Work::where('user_id',$user_id)->where('date',$date)->get('start_time');


        //当日のstart_timeデータがあれば打刻ページへ、なければデータを作成して打刻ページへ
        if(!empty($start_time)){
            dd($start_time);
            return redirect('/');
        }else{
            Work::create([
                'user_id' => Auth::id(),
                'date' => Carbon::today()->format('Y-m-d'),
                'start_time' => Carbon::now()->format('H:i:s')
            ]);
        }

        

        return redirect('/');
    }

    //勤務終了のアクション
    public function end(Request $request)
    {
        //当日のend_timeデータの検索
        $user_id = Auth::id();
        $date =Carbon::today()->format('Y-m-d');
        $end_time = Work::where('user_id',$user_id)->where('date',$date)->get('end_time');

        //当日のstart_timeデータがある、かつ当日のend_timeがない場合はデータを更新。
        //上記の条件があてはまらなければ、そのまま打刻ページへ
        if(isset($start_time) && $end_time == null){
            $end_time = Carbon::now()->format('H:i:s');
            Work::where('id',$user_id)->where('date',$date)->update($end_time);
        }
        return redirect('/');
    }

}
