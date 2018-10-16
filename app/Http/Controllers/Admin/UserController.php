<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Project;

class UserController extends Controller
{
    //
    public function index()
    {
        $usuarios = User::where('user_type','<>','A')->get();
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
        $projects = Project::orderBy('created_at', 'DESC')->get();
        return view('admin.users.edit',compact('user','projects'));
    }

    public function update(Request $request, User $usuario)
    {
        $rules = [
            'name' => 'required|max:30',
            'password' => 'nullable|min:3'
        ];

        $messages = [
            'name.required' => 'el nombre es requerido.',
            'name.max' => 'se superó el máximo de caracteres.',
            'password.min' => 'la contraseña debe ser mas larga.'
        ];

        $this->validate($request,$rules,$messages);

        $usuario->name = $request->name;
        if ($request->password) $usuario->password = bcrypt($request->password);

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success','el usuario se he modificado correctamente.');

    }

    public function destroy(User $usuario)
    {
        try{
            $usuario->delete();
            return back()->with('success','usuario eliminado correctamente.');
        }catch(\Exception $e){
            return back()->with('error','error al eliminar al usuario.');
        }

    }
}
