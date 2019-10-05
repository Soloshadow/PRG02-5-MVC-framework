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
        $user = User::find($user);
        $project = $user->project->get();
        return view('home', [
            'user' => $user,
            'project' => $project,
        ]);
    }
}
