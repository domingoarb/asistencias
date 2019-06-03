<?php

namespace App\Models;

use App\Util;
use Carbon\Carbon;
use App\Models\Worker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Attendance extends Model
{
    protected $fillable=[
        'attendance',
        'worker_id',
        'date',
        'check_in',
        'check_out'
    ];

    public function workers(){
        return $this->belongsTo(Worker::class, 'worker_id', 'id');
    }

    public function getDateAttribute($date){
        return date('d-m-Y', strtotime($date));
    }

/*     public function getCheckinAttribute($date){
        if (!empty($date))
            return Carbon::parse($date)->format('H:i');
    }

    public function getCheckoutAttribute($date){
        if (!empty($date))
            return Carbon::parse($date)->format('H:i');
    }
 */
    public static function listCountPerMonth($month, $year){
        return self::selectRaw('date as start, count(1) as title')
                    ->whereMonth('date', $month)
                    ->whereYear('date', $year)
                    ->groupBy('date')
                    ->get();
    }

    public static function listByDate($date=null){
        return self::select('departaments.name', 'departaments.id', DB::raw("COUNT(1) as count"))
                    ->join('workers', 'workers.id', '=', 'attendances.worker_id')
                    ->rightJoin('departaments', 'departaments.id', '=', 'workers.departament_id')
                    ->whereDate('date', $date)
                    ->groupBy('departaments.name', 'departaments.id')
                    ->get();
    }


    public static function saving($data){
        foreach ($data->workers_id as $worker) {
            self::create(['worker_id'=>$worker, 'check_in'=>$data->check_in, 'check_out'=>$data->check_out]);
        }
    }
}
