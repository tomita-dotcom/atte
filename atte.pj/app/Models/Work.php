<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = [
        'user_id',
        'date',
        'start_time',
        'end_time',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function rests(){
        return $this->hasMany('App\Models\Rest');
    }

    public function total_rests()
    {
        $rests = $this->rests()->get();

        $rest_total_sec = 0;

        foreach($rests as $rest)
        {
            $rest_start_time = $rest->start_time;
            $rest_end_time = $rest->end_time;

            $rest_start_time_sec = $this->to_sec($rest_start_time);
            $rest_end_time_sec = $this->to_sec($rest_end_time);

            $rest_total_sec += $rest_end_time_sec - $rest_start_time_sec;
        }

        if ($rest_total_sec < 0){
            return ('休憩中');
        } elseif ($rest_total_sec > 0){
            return $this->to_time($rest_total_sec);
        } else {
            return('-');
        }
        
    }

    public function total_works()
    {
        $work_start_time = $this->start_time;
        $work_end_time = $this->end_time;

        if ($work_end_time){     
            $work_start_time_sec = $this->to_sec($work_start_time);
            $work_end_time_sec = $this->to_sec($work_end_time);

            $work_total_sec = $work_end_time_sec - $work_start_time_sec - $this->to_sec($this->total_rests());
            return $this->to_time($work_total_sec);
        } else {
            return('勤務中');
        }
    }

    public function to_sec($time)
    {
        $t = explode(":", $time); //配列（$t[0]（時）、$t[1]（分）、$t[2]（秒））にする
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
        return ($h * 60 * 60) + ($m * 60) + $s;
    }

    public function to_time($sec)
    {
        $hours = floor($sec / 3600); //時間
        $minutes = floor(($sec / 60) % 60); //分
        $seconds = floor($sec % 60); //秒
        return sprintf("%2d:%02d:%02d", $hours, $minutes, $seconds);
    }
}
