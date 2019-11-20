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
            'search' => 'max: 255',
        ]);

        
        // dd($validateData);
        
        if($validateData){

            if($request->roles != null){
                
                // Eager load all users where name is like requested and the role is like the requested

                $developer = User::with('role')->where('name', 'like', '%'.$request->search.'%')->where('role_id', $request->roles)->first();
                
                if($developer == null){
                    
                    return view('developers.searchResults', [
                        'developers' => null
                    ]);

                }

                return view('developers.searchResults', [
                    'developers' => $developer,
                    'roles' => $developer->role->role
                ]);
            }

            // Eager load all users except the ones with role id of  1 (project owners) and check where the name is something like the requested
            $developer = User::with('role')->where('name', 'like', '%'.$request->search.'%')->first();
            return view('developers.searchResults', [
                'developers' => $developer,
                'roles' => $developer->role->role
            ]);
        }
        

        // dd('testing');
    }
}
