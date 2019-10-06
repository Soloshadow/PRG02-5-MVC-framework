@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome back, {{$user->name}}! <br />
                    You are a {{$user->role->position}} {{$user->level->level}} <br />
                    Projects you are currently working on:
                    <ul>
                        @foreach($project as $p)
                            <li>{{$p->project_name}}</li>
                        @endforeach
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
