<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'project_id'
    ];

    public static $rules = [
        'name' => 'required|string|min:5|max:30',
        'description' => 'nullable|string|min:15|max:255',
        'project_id' => 'nullable|numeric|exists:projects,id'
    ];

    public static $messages = [
        'name.required' => 'El nombre es requerido.',
        'name.min' => 'El nombre debe ser mas largo.',
        'name.max' => 'El nombre debe ser mas corto.',
        'description.min' => 'La descripción debe ser mas larga.',
        'description.max' => 'La descripción debe ser mas corta.',
        'project_id.numeric' => 'El proyecto es inválido.',
        'project_id.exists' => 'El proyecto es inválido.',
    ];

    protected $hidden = [
        'deleted_at'
    ];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function proyecto()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
