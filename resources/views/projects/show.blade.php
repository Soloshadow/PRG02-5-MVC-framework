@extends('layouts.app');

@section('content')
    <div class="container">

        {{$project->project_name}}

        <hr/>
        
        @if($tasks != null)
            @foreach($tasks as $tasks)
                <ul>
                    <li>{{$tasks->task}} - {{ $tasks->MoSCoW}} - {{ $tasks->progress}} - </li>
                </ul>
            @endforeach
        @endif

    </div>

@endsection