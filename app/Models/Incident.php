<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;

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

    protected $dates = [
        'deleted_at','created_at','updated_at'
    ];

    public static $rules = [
        'title' => 'required|string|min:5|max:30',
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

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    public function support()
    {
        return $this->belongsTo('App\User','support_id');
    }

    public function client()
    {
        return $this->belongsTo('App\User','client_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function getClientNameAttribute()
    {
        if($this->client) return $this->client->name;

        return 'desconocido';
    }

    public function getSupportNameAttribute()
    {
        if($this->support) return $this->support->name;

        return 'No Asignado';
    }

    public function getSeverityNameAttribute()
    {
        if($this->severity == 'M') return 'Menor';
        if($this->severity == 'N') return 'Normal';
        if($this->severity == 'A') return 'Alta';

        return '';
    }

    public function getCreatedAttribute()
    {
        if($this->created_at) return $this->created_at->format('d/m/Y h:i a');
    }

    public function getResumeAttribute()
    {
        return mb_strimwidth($this->title,0,15,'...');
    }

    public function getCategoryNameAttribute()
    {
       if($this->category) return $this->category->name;

       return 'General';
    }

    public function getLevelNameAttribute()
    {
       if($this->level) return $this->level->name;

       return 'Desconocido';
    }

    public function getStateAttribute()
    {
       if($this->active == 0) return 'Resuelto';

       if($this->support_id) return 'Asignado';

       return 'Pendiente';
    }

    public function getStateIdAttribute()
    {
       if($this->active == 0) return 2;

       if($this->support_id) return 1;

       return 0;
    }


}
