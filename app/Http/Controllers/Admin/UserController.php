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
        return view('admin.users.index');
    }

    public function store(Request $request)
    {

    }

    public function edit(User $usuario)
    {

    }

    public function update(Request $request, User $usuario)
    {

    }

    public function delete(User $usuario)
    {

    }
}
