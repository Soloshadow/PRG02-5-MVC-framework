@extends('layouts.app');

@section('content')

    {{$project->project_name}}

    @foreach($project->tasks as $tasks)
    {{-- {{ $tasks}} --}}
        <ul>
        <li>{{$tasks->task}} - {{ $tasks->MoSCoW}} - {{ $tasks->progress}} - </li>
        </ul>
    @endforeach

@endsection