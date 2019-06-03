<?php

namespace App\Models;

use App\Models\Workers;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $fillable= [
        'name',
        'description',
        'management_id'
    ];

    public function workers(){
        return $this->HasMany(Worker::class, 'departament_id', 'id');
    }

    public function getNameAttribute($name){
        return ucwords($name);
    }

    public function getDescriptionAttribute($description){
        return ucwords($description);
    }
}
