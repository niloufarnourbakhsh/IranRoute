<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //

    public static function create($array)
    {
    }

    public function photos(){

        return $this->hasManyThrough('App\Photo','App\Post');
    }

    public function post(){

        return $this->belongsTo('App\Post');
    }
}
