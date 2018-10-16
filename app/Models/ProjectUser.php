<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectUser extends Model
{
    //
    use SoftDeletes;

    protected $table = 'project_user';

    protected $fillable = [
        'project_id', 'user_id', 'level_id'
    ];

    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $hidden = [
        'deleted_at'
    ];

    public static $rules = [
        'project_id' => 'required|numeric|exists:projects,id',
        'user_id' => 'required|numeric|exists:users,id',
        'level_id' => 'required|numeric|exists:levels,id'
    ];

    public static $messages = [
        'project_id.required' => 'el proyecto es requerido',
        'user_id.required' => 'el usuario es requerido',
        'level_id.required' => 'el nivel es requerido',
        'project_id.exists' => 'el proyecto es inválido',
        'user_id.exists' => 'el usuario es inválido',
        'level_id.exists' => 'el nivel es inválido'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
}
