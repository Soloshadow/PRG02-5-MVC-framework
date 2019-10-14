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
        
        //Elonquent model to get user data from from user table
        $user = User::findOrFail($user); //findOrFail will return a 404 error when the user can not be found
        $project = $user->project;
        $tasks = $user->projectTask;

        // passing the data to the view
        return view('home', [
            'user' => $user,
            'project' => $project,
            'tasks' => $tasks,
        ]);
    }
}
