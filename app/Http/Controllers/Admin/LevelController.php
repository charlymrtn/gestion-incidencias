<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level as Nivel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    //
    public function store(Request $request)
    {
        //
        try{
            $this->validate($request,Nivel::$rules,Nivel::$messages);

            $nivel = Nivel::create($request->all());

            return back()->with('success','nivel creada correctamente');
        }catch(\Exception $e){
            return back()->with('error','error al crear el nivel');
        }

    }

    public function update(Request $request, Nivel $nivel)
    {
        //
        try{
            $validator = $this->validate($request,Nivel::$rules,Nivel::$messages);

            $nivel->name = $request->name;

            $nivel->save();

            return back()->with('success','nivel editado correctamente');
        }catch (\Exception $e){
            return back()->with('error','error al editar el nivel');
        }

    }

    public function destroy(Nivel $nivel)
    {
        try{

            $nivel->delete();

            return back()->with('success','nivel eliminado correctamente');
        }catch (\Exception $e){
            return back()->with('error','error al eliminar el nivel');
        }
    }

    public function getLevelsByProject($proyecto)
    {

        $niveles = Nivel::where('project_id',$proyecto)->get();

        if($niveles) return $niveles;

    }
}
