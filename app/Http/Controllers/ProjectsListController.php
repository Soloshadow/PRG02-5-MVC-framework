<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Project;
use App\User;

class ProjectsListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {

        // Get the user
        $user = User::findOrFail($user);

        // Get all projects with their tasks
        $projects = $user->projects;

        return view('projects.index', [
            'projects' => $projects,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user)
    {
        // find current logged in user or throw an error page
        $user = User::findOrFail($user);

        // get list of owners and developers except the current logged in user
        $developers = User::where('id', '!=', $user->id)->get();

        return view('projects.create', [
            'user' => $user,
            'developers' => $developers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user)
    {

        // Form validation before storing in DB
        $validation = $request->validate([
            'project_name' => 'required|min:5',
            'developers' => 'required'
        ]);

        $project = new Project;

        $project->project_name = $validation['project_name'];

        $project->save();
        
        // Saving project to the correct user in pivot table
        $project -> users() -> attach($user);
        $project -> users() -> attach($validation['developers']);
        
        // redirecting user back to the specific url
        return redirect()->route('projects.index', ['user' => $user]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user, $id)
    {
        
        // Get the user
        $user = User::findOrFail($user);

        // get the user role id
        $role = $user->role->id;
        

        // find one project, belonging to a specific user, based on the id
        $project = $user->projects->find($id);
        
        /* 
            Compare current user role to a specific role.
            Get the tasks from DB based on user role.
            Might be deleted later.
        */
        switch($role){
            case 5:
                $tasks = $project->tasks->whereIn("MoSCoW", ['W'])->sortBy('MoSCoW');
                break;
            case 4:
                $tasks = $project->tasks->whereIn("MoSCoW", ['S', 'C', 'W'])->sortBy('MoSCoW');
                break;
            case 1:
                $tasks = null;
                break;
            default:
                $tasks = $project->tasks->sortBy('MoSCoW');
                break;
        }
        
        return view('projects.show', [
            'project' => $project,
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
