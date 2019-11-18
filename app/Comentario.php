<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model

    //
    protected $table = 'comentario';
   
    public function user(){
        return $this->belongsTo('App\Usuario', 'user_id');
    }

    public function image(){
        return $this->belongsTo('App\Imagen', 'image_id');
    }
}
