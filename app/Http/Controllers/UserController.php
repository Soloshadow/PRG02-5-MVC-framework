<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    //
    public function index(){

        // Eager load all users except the ones with role id of  1 (project owners)
        $developers = User::with('role')->where('role_id', '!=', 1)->get();

        // return a list of roles 
        $roles = Role::where('role', '!=', 'project owner')->get();

        return view('developers.index', [
            'developers' => $developers,
            'roles' => $roles
        ]);
    }

    public function searchDevs(Request $request){


        // validation request
        $validateData = $request->validate([
            'search' => 'required|min:5|max:255',
        ]);

        // Eager load all users except the ones with role id of  1 (project owners)
        $developer = User::with('role')->where('name', '=', $request->search)->first();
        // dd($developer->role);

        if(!$developer || $developer == null){
            dd('no one with that name');
        }
        
        return view('developers.results', [
            'developers' => $developer,
            'roles' => $developer->role->role
        ]);

    }
}
