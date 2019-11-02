@extends('layouts.app');

@section('content')
    <div class="container">

        {{$project->project_name}}

        <hr/>
        
        @if($tasks != null)
            @foreach($tasks as $task)
                <ul>
                    <li>
                        {{$task->task}} - {{ $task->MoSCoW}} - {{ $task->progress}} - 
                        <a href="{{ route('tasks.edit', ['user' => Auth::id(), 'project' => $project->id, 'task' => $task->id] ) }}" class="text-primary">Edit</a> - 
                        <a href="{{ route('tasks.delete', ['user' => Auth::id(), 'project' => $project->id, 'task' => $task->id] ) }}" class="text-danger">Delete</a>
                    </li>
                </ul>
            @endforeach
        @endif
                
        <a href="{{ route('projects.edit', ['user' =>Auth::id(),'project' =>  $project->id]) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('tasks.create', ['user' =>Auth::id(), 'project' => $project->id] ) }}" class="btn btn-secondary">Add Task</a>
        <a href="{{ route('projects.destroy', ['user' =>Auth::id(),'project' =>  $project->id]) }}" class="btn btn-danger">Delete</a>

    </div>

@endsection