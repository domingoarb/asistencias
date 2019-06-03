<?php

namespace App\Models;

use App\Models\Departament;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    const ACTIVE_WORKER = 'true';
    const UNACTIVE_WORKER = 'false';

    protected $fillable=[
        'name',
        'lastname',
        'email',
        'phone',
        'departament_id',
    ];

    public function getNameAttribute($name){
        return ucwords($name);
    }

    public function getLastnameAttribute($lastname){
        return ucwords($lastname);
    }

    public function getFullNameAttribute()
    {
        return "{$this->name}, {$this->lastname}";
    }

    public function isActive(){
        return $this->status == Worker::ACTIVE_WORKER;
    }

    public function departament(){
        return $this->belongsTo(Departament::class, 'departament_id', 'id');
    }

    public function attendances(){
        return $this->hasMany(Attendance::class, 'worker_id', 'id');
    }

    public static function search($search){
        return self::selectRaw("id, (name || ', ' || lastname) as text")
                    ->whereRaw("lower(name) like lower('%$search%')")
                    ->orWhereRaw("lower(lastname) like lower('%$search%')")
                    ->limit(30)->get();
      }
}
