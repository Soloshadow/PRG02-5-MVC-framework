@extends('layouts.app')

@section('content')

<div class="container">
    <ul>
        @foreach($projects as $project)
        <li>{{$project->project_name}} 
            <ul>
                @foreach($project->tasks as $task)
                    <li>{{$task->task}}</li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
    
</div>

@endsection