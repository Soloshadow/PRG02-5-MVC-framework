<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
Use App\Project;
Use App\Task;

class TaskController extends Controller
{
    
    public function store(Request $request,$user, $project){

        // Form validation before storing in the DB
        $validation = $request->validate([
            'task' => 'required|min:5|max:255',
            'progress' => 'required|filled', // user must choose a field
            'moscow' => 'required|filled'
        ]);

        // get current project id to be linked to task
        $project_id = Project::find($project)->id;

        // dd($project_id);

        $task = new task;
        $task->project_id = $project_id;
        $task->task = $validation['task'];
        $task->MoSCoW = $validation['moscow'];
        $task->progress = $validation['progress'];

        $task->save();

        return redirect()->route('projects.show', ['user' => $user, 'id' => $project]);

    }
    
}
