<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
      'message', 'user_id', 'incident_id'
    ];

    protected $dates = [
      'created_at', 'updated_at', 'deleted_at'
    ];

    protected $hidden = [
      'deleted_at'
    ];

    public static $rules = [
      'message' => 'required|string|min:5|max:255',
      'incident_id' => 'required|numeric|exists:incidents,id'
    ];

    public static $messages = [
      'message.required' => 'comentario requerido.',
      'incident_id.required' => 'incidencia requerida.',
      'message.min' => 'El mensaje debe de ser mas largo.',
      'message.max' => 'Llegaste al límite del mensaje.',
      'incident_id.exists' => 'incidencia inválida.',
      'incident_id.numeric' => 'incidencia inválida.'
    ];

    public function incident()
    {
      return $this->belongsTo('App\Models\Incident');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function getCreatedFormatAttribute()
    {
      $date = $this->created_at;

      if($date) return $date->format('d/M/Y h:i:s a');

      return null;
    }

    public function getUserNameAttribute()
    {
      return $this->user->name;
    }
}
