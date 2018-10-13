<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model
{
    use SoftDeletes;
    //

    protected $fillable = [
        'title','description','severity','category_id','level_id','client_id','support_id'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public static $rules = [
        'title' => 'required|string|min:5|max:20',
        'description' => 'required|string|min:15|max:255',
        'severity' => 'required|string|max:1|in:M,N,A',
        'category_id' => 'nullable|exists:categories,id',
    ];

    public static $messages = [
        'title.required' => 'el título es requerido.',
        'description.required' => 'la descripción es requerida.',
        'severity.required' => 'el nivel de severidad es requerido.',
        'category_id.required' => 'la categoría es requerida.',
        'title.min' => 'el título debe ser más largo.',
        'title.max' => 'el título tiene un máximo de 20 carácteres.',
        'description.min' => 'la descripción debe ser más larga.',
        'description.max' => 'la descripción tiene un máximo de 255 carácteres.',
        'severity.max' => 'el nivel de severidad tiene un máximo de 1 carácter.',
        'severity.in' => 'el nivel de severidad es inválido.',
        'category_id.exists' => 'la categoría es inválida.',
    ];
}
