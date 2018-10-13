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
        'name', 'description', 'start'
    ];

    protected $dates = ['start'];

    protected $hidden = [
        'deleted_at'
    ];

    public static $rules = [
        'name' => 'required|string|min:5|min:5|max:30',
        'description' => 'required|string|min:15|max:255'
    ];

    public static $messages = [
        'name.required' => 'el nombre es requerido',
        'description.required' => 'la descripción es requerida',
        'name.max' => 'el nombre tiene como máximo 30 caracteres',
        'name.min' => 'el nombre tiene que ser más largo',
        'description.max' => 'la descripción tiene como máximo 255 caracteres',
        'description.min' => 'la descripción tiene que ser más larga',
    ];

    public function getStartDateAttribute()
    {
        $date = $this->start;

        if($date) return $date->format('d/m/Y');

        return null;
    }

}
