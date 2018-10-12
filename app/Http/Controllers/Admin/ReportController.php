<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Incident as Bug;

use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    //

    public function report()
    {
        $categories = Category::where('project_id',1)->get();
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
        $bug->client_id = Auth::user()->id;

        $bug->save();

        return back();
    }
}
