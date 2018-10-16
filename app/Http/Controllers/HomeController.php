<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident as Bug;
use App\Models\ProjectUser;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->is_support){
            $p_user = ProjectUser::where('user_id',$user->id)->where('project_id',$user->selected_project_id)->first();
            //return $p_user;

            $my_bugs = Bug::where('project_id',$user->selected_project_id)->where('support_id',$user->id)->get();

            if($p_user) {
                $not_bugs = Bug::where('support_id', null)->where('level_id',$p_user->level_id)->get();
            }else{
                $not_bugs = [];
            }

        }

        $reported_bugs = Bug::where('client_id',$user->id)->where('project_id',$user->selected_project_id)->get();

        return view('home',compact('my_bugs','not_bugs','reported_bugs'));
    }

    public function welcome()
    {
        return view('welcome');
    }
}
