@extends('layouts.app');

@section('content')
    <div class="container">

        <hr/>
        
        @foreach($tasks as $task)
            <ul>
                <li>
                    {{$task->task}} - {{ $task->MoSCoW}} - {{ $task->progress}} - 
                    <div class="form-group row">
                        {{-- <form action="{{ route('tasks.edit', ['user' => Auth::id(), 'project' => $project->id, 'task' => $task->id])  }}">
                            @csrf
                            <button type="submit" class="btn btn-info">
                                Edit
                            </button>
                        </form> --}}
                        <a href="{{ route('tasks.edit', ['user' => Auth::id(), 'project' => $project->id, 'task' => $task->id])  }}">
                            <button class="btn btn-info">Edit</button>
                        </a>
                        <form method="POST" action="{{ route('tasks.destroy', ['user' => Auth::id(), 'project' => $project->id, 'task' => $task->id])  }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2">
                                Delete
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        @endforeach
                
        <a href="{{ route('projects.edit', ['user' =>Auth::id(),'project' =>  $project->id]) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('tasks.create', ['user' =>Auth::id(), 'project' => $project->id] ) }}" class="btn btn-secondary">Add Task</a>
        <a href="{{ route('projects.destroy', ['user' =>Auth::id(),'project' =>  $project->id]) }}" class="btn btn-danger">Delete</a>

    </div>

@endsection