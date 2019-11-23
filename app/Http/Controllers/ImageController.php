<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Image;
use App\Comentario;
use App\Like;

class ImageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('image.create');
    }

    public function save(Request $request){

        $validate = $this->validate($request,[
            'descripcion' => 'required',
            'image_path' => 'required|image'
        ]);

        $image_path = $request->file("image_path");
        $descripcion = $request->descripcion;
        
        $user = \Auth::user();
        
        $image = new Image();
        $image->image_path = null;
        $image->user_id = $user->id;
        $image->descripcion = $descripcion; 
        if ($image_path){
           $image_path_name = time().$image_path->getClientOriginalName();
           Storage::disk('images')->put($image_path_name, File::get($image_path));
           $image->image_path = $image_path_name;
        }
        $image->save();
        return redirect()->route('home')->with([
            'message' => 'la foto ha sido gurdada exitosamente'
        ]);
    }

    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
    public function detail($id){
       $image = Image::find($id); 
       return view('image.detail', [
           'img' => $image
       ]);
    }
    public function delete($id){

        $user = \Auth::user();
        $img = Image::find($id);
        $com = Comentario::where('image_id',$id)->get();
        $likes = Like::where('image_id',$id)->get();

        if($user && $img->user->id == $user->id){
            if($com && count($com) >=1){
                foreach($com as $c){
                    $c->delete();
                }
            }
            if($likes && count($likes) >=1){
                foreach($likes as $li){
                    $li->delete();
                }
            }

            Storage::disk('images')->delete($img->image_path);
            $img->delete();
            $mess = array('message' => 'la imagen se ha borrado correctamente');
        }
        else{
            $mess = array('message' => 'la imagen no se ha borrado');
        }
        return redirect()->route('home')->with($mess);
    }

    public function edit($id){
        $user = \Auth::user();
        $image = Image::find($id);

        if($user && $image && $image->user->id == $user->id){
            return view('image.edit', [
                'img' => $image
            ]);
        }

        else{
            return redirect()->route('home');
        }
    }

    public function update(Request $req){

        $validate = $this->validate($req,[
            'descripcion' => 'required',
            'image_path' => 'image'
        ]);
        
        $image_id = $req->input('image_id');
        $image_path = $req->file('image_path');
        $des = $req->input('descripcion');

        $image = Image::find($image_id);
        $image->descripcion = $des;
        
        if ($image_path){
           $image_path_name = time().$image_path->getClientOriginalName();
           Storage::disk('images')->put($image_path_name, File::get($image_path));
           $image->image_path = $image_path_name;
        }

        $image->update();
        return redirect()->route('home',['id' => $image_id])->with([
            'message' => 'imagen actualizada con exito']);

    }

}
