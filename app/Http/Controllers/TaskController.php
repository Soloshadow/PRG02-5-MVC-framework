<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TaskRequest;

use App\User;
use App\Project;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user, $id)
    {
        //

        $project = Project::find($id);

        return view('tasks.create',[
            'id' => $project->id,
            'project_name' => $project->project_name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request,$user, $project){

        $validated = $request->validated();

        // get current project id to be linked to task
        $project_id = Project::find($project)->id;

        $task = new Task;
        $task->project_id = $project_id;
        $task->task = $validated['task_name'];
        $task->MoSCoW = $validated['moscow'];
        $task->progress = $validated['progress'];

        $task->save();

        return redirect()->route('projects.show', ['user' => $user, 'project' => $project]);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

        return view('tasks.edit');
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
    public function destroy($user, $project, $id)
    {
        //
        $task = Task::find($id);
        $task->delete();

        return redirect()->back();
    }
}
