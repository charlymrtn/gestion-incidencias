<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name', 'project_id'
    ];

    public static $rules = [
        'name' => 'required|string|min:5|max:30',
        'project_id' => 'nullable|numeric|exists:projects,id',
    ];

    public static $messages = [
        'name.required' => 'El nombre es requerido.',
        'name.min' => 'El nombre debe ser mas largo.',
        'name.max' => 'El nombre debe ser mas corto.',
        'project_id.numeric' => 'El proyecto es inválido.',
        'project_id.exists' => 'El proyecto es inválido.',
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function proyecto()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
