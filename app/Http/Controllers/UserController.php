<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function config(){
        return view('User.config');
    }

    public function update(Request $request){

       $user = \Auth::user();
       $id= $user->id;

       $validation = $this->validate($request, [
           'name' => 'required|string|max:255',
           'surname' => 'required|string|max:255',
           'nick' => 'required|string|max:255|unique:users,nick,'.$id,
           'email' => 'required|string|email|max:255|unique:users,email,'.$id,
       ]);

       $name = $request->input('name');
       $surname = $request->input('surname');
       $nick = $request->input('nick');
       $email = $request->input('email');

       $user->name = $name;
       $user->surname = $surname;
       $user->nick = $nick;
       $user->email = $email;
       $user->update();
       return redirect()->route('config')->with(['message' => 'Usuario Actualizado Correctamente']);
      
    }

}
