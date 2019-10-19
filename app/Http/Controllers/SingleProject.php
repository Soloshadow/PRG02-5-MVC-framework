<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;

class SingleProject extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user, $id)
    {
        // Get the single project using id from database where user_id matches user in parameter
        $user = User::findOrFail($user);

        // get the user role id
        $role = $user->role->id;
        
        // $project = Project::findOrFail($id);

        // find one project, belonging to a specific user, based on the id
        $project = $user->projects->find($id);
        // dd($project);
        
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
                $tasks = $project->tasks;
                break;
        }
        
        
        // dd($user->projects->find($id)->tasks);
        // dd($project->project_name);

        return view('singleproject', [
            'project' => $project,
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
