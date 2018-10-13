<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Project;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    public function store(Request $request)
    {

        $this->validate($request,Project::$rules,Project::$messages);

        $project = Project::create($request->all());

        if($project) return redirect()->back()->with('success','El proyecto fue creado correctamente.');

        return redirect()->back()->with('error','Error al crear el proyecto.');
    }

    public function edit(Project $proyecto)
    {
        return view('admin.projects.edit',compact('proyecto'));
    }
}
