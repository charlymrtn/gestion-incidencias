<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Incident as Bug;
use App\Models\ProjectUser as Assign;
use App\Models\Project;
use App\Models\Level as Nivel;

use Illuminate\Support\Facades\Auth;
use Session;

class ReportController extends Controller
{
    //

    public function create()
    {
        $categories = Project::find(Auth::user()->selected_project_id)->categories;
        return view('incidents.create',compact('categories'));
    }

    public function edit(Bug $incidencia)
    {
        $categories = $incidencia->project->categories;
        return view('incidents.edit',compact('categories','incidencia'));
    }
    //

    public function index()
    {
        $bugs = Bug::all();

        return $bugs;
    }

    public function store(Request $request)
    {

        $this->validate($request,Bug::$rules,Bug::$messages);

        $user = Auth::user();

        $bug = new Bug();
        $bug->title = $request->title;
        $bug->description = $request->description;
        $bug->severity = $request->severity;
        $bug->category_id = $request->category_id ?: null;
        $bug->project_id = $user->selected_project_id ?: null;
        $bug->level_id = Project::find($user->selected_project_id)->first_level->id ?: null;
        $bug->client_id = $user->id;

        $bug->save();

        return redirect()->route('home')->with('success','incidencia creada correctamente.');
    }

    public function update(Request $request, Bug $incidencia)
    {

        $this->validate($request,Bug::$rules,Bug::$messages);

        $incidencia->update($request->all());

        return redirect()->route('incidencias.show',$incidencia->id)->with('success','incidencia editada correctamente.');
    }

    public function show(Bug $incidencia)
    {
        $bug = $incidencia;
        return view('incidents.show',compact('bug'));
    }

    public function take(Bug $incidencia)
    {
        if(Auth::user()->is_support){
            $p_user = Assign::where('project_id',$incidencia->project_id)
                                ->where('user_id',Auth::user()->id)->first();

            if(!$p_user) return back()->with('error','no existe relación');

            if($p_user->level_id != $incidencia->level_id) return back()->with('error','nivel erróneo');

            $incidencia->support_id = Auth::user()->id;
            $incidencia->save();

            return back()->with('success','ahora atiendes la incidencia');

        }else{
            return back()->with('error','usuario sin permisos para esta acción');

        }
    }

    public function solve(Bug $incidencia)
    {
        if($incidencia->client_id == Auth::user()->id){

            if($incidencia->active == 0) return back()->with('error','imposible resolver');

            $incidencia->active = 0;
            $incidencia->save();

            return back()->with('success','incidencia resuelta');

        }else{
            return back()->with('error','usuario sin permisos para esta acción');
        }
    }

    public function open(Bug $incidencia)
    {
        if($incidencia->client_id == Auth::user()->id){

            if($incidencia->active == 1) return back()->with('error','imposible abrir');

            $incidencia->active = 1;
            $incidencia->save();

            return back()->with('success','incidencia abierta');

        }else{
            return back()->with('error','usuario sin permisos para esta acción');
        }
    }

    public function prev(Bug $incidencia)
    {
        if($incidencia->support->id != Auth::user()->id) return back()->with('error','usuario sin permisos para esta acción');

        if($incidencia->prev_level_id){
            $incidencia->level_id =$incidencia->prev_level_id;
            $incidencia->prev_level_id = null;
            $incidencia->support_id = null;
            $incidencia->max_level = 0;
            $incidencia->save();
            return redirect()->route('home')->with('success','incidencia reasignada al nivel previo de atención.');
        }else{

            return back()->with('error','ya no hay niveles anteriores');
        }
    }

    public function next(Bug $incidencia)
    {
        if($incidencia->support->id != Auth::user()->id) return back()->with('error','usuario sin permisos para esta acción');

        $levels = $incidencia->project->levels;
        $level_act = $incidencia->level;

        $next_level_id = $this->getNextlevelId($level_act,$levels);

        if($next_level_id){
            $incidencia->prev_level_id = $incidencia->level_id;
            $incidencia->level_id = $next_level_id;
            $incidencia->support_id = null;

            $levels_proj = Nivel::where('project_id',$incidencia->project->id)->orderBy('id', 'desc')->first();
            if($incidencia->level_id == $levels_proj->id) $incidencia->max_level = 1;

            $incidencia->save();
            return redirect()->route('home')->with('success','incidencia reasignada al siguiente nivel de atención.');
        }else{
            $incidencia->max_level = 1;
            $incidencia->save();
            return back()->with('error','ya no hay niveles superiores');
        }
    }

    private function getNextlevelId($level, $levels)
    {
        if($levels->count() <= 1) return null;

        $pos = -1;
        for ($i=0; $i < $levels->count() - 1; $i++) {
            if($levels[$i]->id == $level->id){
                $pos = $i;
                break;
            }
        }

        if($pos == -1) return null;

       // if($pos == $levels->count()-1) return null;

        return $levels[$pos+1]->id;
    }
}
