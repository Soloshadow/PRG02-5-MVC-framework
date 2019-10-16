@extends('layouts.app');

@section('content')

    {{$project->project_name}}

    @foreach($project->tasks as $tasks)
        <ul>
            <li>{{$tasks->task}} - {{ $tasks->MoSCoW}} - {{ $tasks->progress}}</li>
        </ul>
    @endforeach

@endsection