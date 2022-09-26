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
    public function attendance(Request $request){
        $display_date =Carbon::today()->format('Y-m-d');
        $works = Work::where('date',$display_date)->get();
    
        foreach($works as $work){
            $work_id = $work->work_id;
            $rests = Rest::where('work_id',$work_id)->get();

            foreach($rests as $rest){
                //休憩開始時刻を秒数に変換
                $start_time = $rest->start_time;
                $t = explode(":", $start_time); //配列（$t[0]（時）、$t[1]（分）、$t[2]（秒））にする
                $h = (int)$t[0];
                if (isset($t[1])) { //分の部分に値が入っているか確認
                    $m = (int)$t[1];
                } else {
                    $m = 0;
                }
                if (isset($t[2])) { //秒の部分に値が入っているか確認
                    $s = (int)$t[2];
                } else {
                    $s = 0;
                }
                $start_time_sec = ($h * 60 * 60) + ($m * 60) + $s;

                //休憩終了時刻を秒数に変換
                $end_time = $rest->end_time;
                $t = explode(":", $end_time); //配列（$t[0]（時）、$t[1]（分）、$t[2]（秒））にする
                $h = (int)$t[0];
                if (isset($t[1])) { //分の部分に値が入っているか確認
                    $m = (int)$t[1];
                } else {
                    $m = 0;
                }
                if (isset($t[2])) { //秒の部分に値が入っているか確認
                    $s = (int)$t[2];
                } else {
                    $s = 0;
                }
                $end_time_sec = ($h * 60 * 60) + ($m * 60) + $s;

                //休憩の合計時間を算出
                $rest_total_sec += $end_time_sec - $start_time_sec;
                $hours = floor($$rest_total_sec / 3600); //時間
                $minutes = floor(($$rest_total_sec / 60) % 60); //分
                $seconds = floor($$rest_total_sec % 60); //秒
                $rest_total = sprintf("%2d:%02d:%02d", $hours, $minutes, $seconds);
            }
        }

        foreach($works as $work){
                //勤務開始時刻を秒数に変換
                $start_time = $rest->start_time;
                $t = explode(":", $start_time); //配列（$t[0]（時）、$t[1]（分）、$t[2]（秒））にする
                $h = (int)$t[0];
                if (isset($t[1])) { //分の部分に値が入っているか確認
                    $m = (int)$t[1];
                } else {
                    $m = 0;
                }
                if (isset($t[2])) { //秒の部分に値が入っているか確認
                    $s = (int)$t[2];
                } else {
                    $s = 0;
                }
                $start_time_sec = ($h * 60 * 60) + ($m * 60) + $s;

                //勤務終了時刻を秒数に変換
                $end_time = $rest->end_time;
                $t = explode(":", $end_time); //配列（$t[0]（時）、$t[1]（分）、$t[2]（秒））にする
                $h = (int)$t[0];
                if (isset($t[1])) { //分の部分に値が入っているか確認
                    $m = (int)$t[1];
                } else {
                    $m = 0;
                }
                if (isset($t[2])) { //秒の部分に値が入っているか確認
                    $s = (int)$t[2];
                } else {
                    $s = 0;
                }
                $end_time_sec = ($h * 60 * 60) + ($m * 60) + $s;

                //勤務の合計時間を算出
                $work_total_sec += $end_time_sec - $start_time_sec;
                $hours = floor($work_total_sec / 3600); //時間
                $minutes = floor(($work_total_sec / 60) % 60); //分
                $seconds = floor($work_total_sec % 60); //秒
                $work_total = sprintf("%2d:%02d:%02d", $hours, $minutes, $seconds);
            }

            $list_element = [
            'display_date' => $display_date,
            'rest_total' => $rest_total,
            'work_total' => $work_total,
            ];

        return view('attendance', $list_element);

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
