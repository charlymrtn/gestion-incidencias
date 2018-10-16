<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProjectUser;
use App\Models\Level as Nivel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProjectUserController extends Controller
{
    
    public function store(Request $request)
    {
        $this->validate($request,ProjectUser::$rules,ProjectUser::$messages);
        $nivel = Nivel::find($request->level_id)
                        ->where('project_id',$request->project_id)->first();
        
        if(!$nivel) return redirect()->back()->with('error','el nivel no pertenece a ese proyecto');

        $p_user = ProjectUser::where('project_id',$request->project_id)
                            ->where('user_id',$request->user_id)->first();

        if($p_user) return redirect()->back()->with('error','el usuario ya pertenece a este proyecto');

        $project_user = ProjectUser::create($request->all());

        return redirect()->back()->with('success','asignación realizada al usuario');
    }

    public function update(Request $request, ProjectUser $p_user)
    {
        $this->validate($request,
        [
            'level_id' => 'required|numeric|exists:levels,id'
        ],[
            'level_id.required' => 'el nivel es requerido.',
            'level_id.exists' => 'el nivel es inválido.',
        ]);

        $nivel = Nivel::find($request->level_id)
                        ->where('project_id',$p_user->project->id)->first();
        
        if(!$nivel) return redirect()->back()->with('error','el nivel no pertenece a ese proyecto');

        $p_user->level_id = $request->level_id;

        $p_user->save();

        return redirect()->back()->with('success','asignación actualizada.');
    }

    public function destroy(ProjectUser $p_user)
    {
        
        $p_user->forceDelete();

        return redirect()->back()->with('success','asignación eliminada correctamente.');
    }

   
}
