@extends('layouts.app')

@section('content')

<div class="container">
        
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Current projects</div>

                <div class="card-body">
                    <ul>
                        @foreach($projects as $p)
                            <li>
                                {{$p->project_name}} -
                                <a href="{{ route('projects.show', ['user' =>$user, 'project' => $p->id]) }}"> view </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('projects.create', ['user' => $user]) }}" class="btn btn-primary">Create</a>
</div>

@endsection

