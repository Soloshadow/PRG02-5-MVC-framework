@extends('layouts.app');

@section('content')
    <div class="container">

        {{$project->project_name}}

        <hr/>
        
        @if($tasks != null)
            @foreach($tasks as $tasks)
                <ul>
                    <li>
                        {{$tasks->task}} - {{ $tasks->MoSCoW}} - {{ $tasks->progress}} - 
                        <a href="/" class="text-primary">Edit</a> - 
                        <a href="/" class="text-danger">Delete</a>
                    </li>
                </ul>
            @endforeach
        @endif
                
        <a href="{{ route('projects.update', ['user' =>Auth::id(),'id' =>  $project->id]) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('projects.update', ['user' =>Auth::id(),'id' =>  $project->id]) }}" class="btn btn-secondary">Add Task</a>
        <a href="{{ route('projects.destroy', ['user' =>Auth::id(),'id' =>  $project->id]) }}" class="btn btn-danger">Delete</a>

    </div>

@endsection