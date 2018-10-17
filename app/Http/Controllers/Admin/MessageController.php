<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class MessageController extends Controller
{

    public function store(Request $request)
    {
        //return $request;
        $this->validate($request,Message::$rules,Message::$messages);

        $request->merge([
                'user_id'=> Auth::user()->id,
            ]);

        $message = Message::create($request->all());

        if(!$message) return redirect()->back()->with('error','error la crear el comentario.');

        return redirect()->route('incidencias.show',$message->incident_id)->with('success','comentario agregado correctamente.');
    }
}
