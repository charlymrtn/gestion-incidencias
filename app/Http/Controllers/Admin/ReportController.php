<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;

class ReportController extends Controller
{
    //

    public function report()
    {
        $categories = Category::where('project_id',1)->get();
        return view('admin.report',compact('categories'));
    }
}
