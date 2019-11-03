@extends('layouts.app')

@section('content')

<div class="container">
        
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Current projects</div>

                <div class="card-body">
                    <ul>
                        @foreach($user_projects->projects as $project)
                            <li>
                                {{$project->project_name}} -
                                <a href="{{ route('projects.show', ['user' =>$user_projects->id, 'project' => $project->id]) }}"> view </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('projects.create', ['user' => $user_projects->id]) }}" class="btn btn-primary">Create</a>
</div>

@endsection

