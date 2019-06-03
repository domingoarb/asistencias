<?php

namespace App\Models;

use App\Models\Departament;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $fillable= [
        'name',
        'description'
    ];

    public function departaments(){
        return $this->hasMany(Departament::class);
    }
}
