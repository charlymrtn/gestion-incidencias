<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Project extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'start_date'
    ];

    protected $dates = ['start_date'];

    protected $hidden = [
        'deleted_at'
    ];

    public static $rules = [
        'name' => 'required|string|min:5|min:5|max:30',
        'description' => 'required|string|min:15|max:255',
        'start_date' => 'nullable|date|after:yesterday'
    ];

    public static $messages = [
        'name.required' => 'el nombre es requerido',
        'description.required' => 'la descripción es requerida',
        'name.max' => 'el nombre tiene como máximo 30 caracteres',
        'name.min' => 'el nombre tiene que ser más largo',
        'description.max' => 'la descripción tiene como máximo 255 caracteres',
        'description.min' => 'la descripción tiene que ser más larga',
        'start_date.after' => 'Escoge otro día, no puede ser antes de hoy.'
    ];

    public function getStartStringAttribute()
    {
        $date = $this->start_date;

        if($date) return $date->format('Y-m-d');

        return null;
    }

    public function getStartAttribute()
    {
        $date = $this->start_date;

        if($date) return $date->format('d/m/Y');

        return null;
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function levels()
    {
        return $this->hasMany('App\Models\Level');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
