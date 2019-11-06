<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $fillable=['photo'];

    public function post(){

        return $this->belongsTo('App\Post');
    }

}
