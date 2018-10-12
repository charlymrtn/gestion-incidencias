<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $usuarios = User::all();
        return view('admin.users.index',compact('usuarios'));
    }

    public function store(Request $request)
    {
        $this->validate($request,User::$rules,User::$messages);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->user_type = 'S';

        $user->save();

        return back()->with('success','El usuario ha sido creado correctamente.');
    }

    public function edit(User $usuario)
    {
        $user = $usuario;
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request, User $usuario)
    {

    }

    public function destroy(User $usuario)
    {
        try{
            $usuario->delete();
            return back()->with('success','usuario eliminado correctamente');
        }catch(\Exception $e){
            return back()->with('error','error al eliminar al usuario.');
        }

    }
}
