<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name' => 'required|string|min:5|max:30',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:3'
    ];

    public static $messages = [
        'name.required' => 'el nombre es requerido',
        'email.required' => 'el correo es requerido',
        'password.required' => 'la contraseña es requerida',
        'name.max' => 'el nombre tiene como máximo 30 caracteres',
        'name.min' => 'el nombre tiene que ser más largo',
        'email.email' => 'el correo no tiene el formato válido',
        'email.unique' => 'el correo ya ha sido utilizado',
        'password.min' => 'la contraseña tiene que se mínimo de 3 caracteres',
    ];


    public function getIsAdminAttribute()
    {
        if($this->user_type == 'A') return true;

        return false;
    }

    public function getIsClientAttribute()
    {
        if($this->user_type == 'C') return true;

        return false;
    }
}
