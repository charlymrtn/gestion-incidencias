<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Incident as Bug;
use App\Models\ProjectUser as Assign;
use App\Models\Project;

use Illuminate\Support\Facades\Auth;
use Session;

class ReportController extends Controller
{
    //

    public function create()
    {
        $proyecto = Project::find(Auth::user()->selected_project_id);
        if(!$proyecto){
            $proyecto = ProjectUser::where('user_id',Auth::user()->id)->first();
            if (!$proyecto){
                $categories = [];
                return view('incidents.create',compact('categories'));
            }else{
                $categories = Category::where('project_id',$proyecto->project_id)->get();
                return view('incidents.create',compact('categories'));
            }
        }

        $categories = Category::where('project_id',$proyecto->id)->get();
        return view('incidents.create',compact('categories'));


    }

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

    public function edit(Bug $incidencia)
    {
        return $incidencia;
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

    public function next(Bug $incidencia)
    {
        return $incidencia;
    }
}
