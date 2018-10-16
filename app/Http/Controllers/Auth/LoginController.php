<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use App\Models\Project;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated()
    {
        $user = Auth::user();
        if(!$user->selected_project_id){
            if(!$user->is_support){
                $user->selected_project_id = Project::first()->id;
            }else{
                if($user->projects){
                    $user->selected_project_id = $user->projects->first()->id;
                }else{
                    $user->selected_project_id = Project::first()->id;
                }
            }
            $user->save();
        }
    }
}
