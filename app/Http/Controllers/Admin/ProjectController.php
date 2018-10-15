<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Category;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $projects = Project::withTrashed()->orderBy('created_at','desc')->get();
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
        $niveles = $proyecto->niveles()->get();
        $categorias = $proyecto->categorias()->orderBy('created_at','desc')->get();
        return view('admin.projects.edit',compact('proyecto','niveles','categorias'));
    }

    public function update(Request $request, Project $proyecto)
    {
        $this->validate($request,Project::$rules,Project::$messages);

        $proyecto->update($request->all());

        if($proyecto) return redirect()->route('proyectos.index')->with('success','El proyecto fue editado correctamente.');

        return redirect()->back()->with('error','Error al modificar el proyecto.');
    }

    public function destroy(Project $proyecto)
    {
        try{
            $proyecto->delete();
            return back()->with('success','proyecto eliminado correctamente.');
        }catch(\Exception $e){
            return back()->with('error','error al eliminar el proyecto.');
        }

    }

    public function active($proyecto)
    {
        try{
            $proyecto = Project::onlyTrashed()
            ->where('id', $proyecto)
            ->restore();

            return back()->with('success','proyecto restaurado correctamente.');

        }catch (\Exception $e){
            return back()->with('error','error al restaurar el proyecto.');
        }


    }

    public function storeCategory(Request $request, Project $proyecto)
    {

    }


}
