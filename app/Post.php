<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable=['is_active','title','body'];
    use Sluggable;
    use SluggableScopeHelpers;


    public function sluggable(): array
    {
        return [

          'slug'=>[

              'source' => 'title',
              'separator' => '-',
              'onUpdate' => true
          ]

        ];
    }


    public function user(){

        return $this->belongsTo('App\User');
    }


    public function city(){

        return $this->belongsTo('App\City');
    }


    public function photos(){

        return $this->hasMany('App\Photo');
    }

    public function comments(){

        return $this->hasMany('App\Comment');
    }
}
