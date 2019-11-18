<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //
    protected $table = 'imagen';
    public function comments(){
        return $this->hasMany('App\Comentario');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }
    
    public function user(){
        return $this->belongsTo('App\Usuario','user_id');
    }
}
