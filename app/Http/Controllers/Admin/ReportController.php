<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Incident as Bug;
use App\Models\ProjectUser;
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
                return view('admin.report',compact('categories'));
            }else{
                $categories = Category::where('project_id',$proyecto->project_id)->get();
                return view('admin.report',compact('categories'));
            }
        }

        $categories = Category::where('project_id',$proyecto->id)->get();
        return view('admin.report',compact('categories'));


    }

    public function index()
    {
        $bugs = Bug::all();

        return $bugs;
    }

    public function store(Request $request)
    {

        $this->validate($request,Bug::$rules,Bug::$messages);

        $bug = new Bug();
        $bug->title = $request->title;
        $bug->description = $request->description;
        $bug->severity = $request->severity;
        $bug->category_id = $request->category_id ?: null;
        $bug->project_id = Auth::user()->selected_project_id ?: null;
        $bug->client_id = Auth::user()->id;

        $bug->save();

        return back();
    }
}
