<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;

class CommentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function save(Request $req){

        $validate = $this->validate($req , [
            'image_id' => 'int|required',
            'content' => 'string|required'
        ]);

        $user = \Auth::user();
        $content = $req->input("content");
        $img_id = $req->input("image_id");

        $comen = new Comentario();
        $comen->user_id =  $user->id;
        $comen->image_id = $img_id; 
        $comen->content = $content;
        $comen->save();

        return redirect()->route(
            'image.detail', 
            [ 'id' => $img_id ]
        )->with(['message' => 'Comentario publicado exitosamente']);
    }

}
