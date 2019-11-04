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
                                {{$project->project_name}} 
                                @can('create', App\Project::class)
                                    - <a href="{{ route('projects.show', ['user' =>$user_projects->id, 'project' => $project->id]) }}"> view </a>
                                @endcan    
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Check if user is authorize to perform this action. Authorization is given in the Policy --}}
    @can('create', App\Project::class)
        <a href="{{ route('projects.create', ['user' => $user_projects->id]) }}" class="btn btn-primary">Create</a>
    @endcan
</div>

@endsection

