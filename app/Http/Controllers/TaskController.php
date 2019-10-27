<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TaskRequest;

Use App\Project;
Use App\Task;

class TaskController extends Controller
{
    
    public function store(TaskRequest $request,$user, $project){

        // Form validation before storing in the DB. This has been moved to the Taskrequest file
        // $validation = $request->validate([
        //     'task' => 'required|min:5|max:255',
        //     'progress' => 'required|filled', // user must choose a field
        //     'moscow' => 'required|filled'
        // ]);

        $validated = $request->validated();

        // get current project id to be linked to task
        $project_id = Project::find($project)->id;

        // dd($project_id);

        $task = new task;
        $task->project_id = $project_id;
        $task->task = $validated['task'];
        $task->MoSCoW = $validated['moscow'];
        $task->progress = $validated['progress'];

        $task->save();

        return redirect()->route('projects.show', ['user' => $user, 'id' => $project]);

    }
    
}
