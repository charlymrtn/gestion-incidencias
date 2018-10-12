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

    }
}
