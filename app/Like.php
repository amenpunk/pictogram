<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $table = 'likes';

    public function image(){
        return $this->hasMany('App\Image', 'user_id');
    }
    
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
