@extends('layouts.app')

@section('content')

<div class="container">
    <ul>
        @foreach($projects as $project)
        <li>{{$project->project_name}}</li>
        @endforeach
    </ul>
    
</div>

@endsection