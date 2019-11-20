@extends('layouts.app');

@section('content')
    <div class="container">
        <h1>{{ $project->project_name }}</h1>
        <hr/>
        
        @foreach($tasks as $task)
            <ul>
                <li>
                    {{$task->task}} - {{ $task->MoSCoW}} - {{ $task->progress}}
                    <div class="form-group row">
                        <a href="{{ route('tasks.edit', ['user' => Auth::id(), 'project' => $project->id, 'task' => $task->id])  }}">
                            <button class="btn btn-info ml-2">Edit</button>
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
        
        <div class="form-group row">
            <a href="{{ route('projects.edit', ['user' =>Auth::id(),'project' =>  $project->id]) }}">
                <button class="btn btn-primary">
                    Edit
                </button>
            </a>
            <a href="{{ route('tasks.create', ['user' =>Auth::id(), 'project' => $project->id] ) }}">
                <button class="btn btn-secondary">
                    Add tasks
                </button>
            </a>
            <form action="{{ route('projects.destroy', ['user' => Auth::id(), 'project' => $project->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class='btn btn-danger'>Delete</button>
            </form>
        </div>

    </div>

@endsection