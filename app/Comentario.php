<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

    //
    protected $table = 'comentario';
   
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function image(){
        return $this->belongsTo('App\Image', 'imagen_id');
    }
}
