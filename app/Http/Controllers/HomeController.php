<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function index($user)
    {  
         
        
        
        //Elonquent model to get logged in user data from user table
        $user = User::findOrFail($user); //findOrFail will return a 404 error when the user can not be found
        // passing the data to the view
        return view('home', [
            'user' => $user,
            'role' => $user->role->role, // get the user role and pass it as a variable into the home view
            'project' => $user->projects, // get the project the user is assigned to and pass it to the home view
            'tasks' => $user->projectTasks, // get the prohect tasks from the user and pass it to the home view
        ]);
    }
}
