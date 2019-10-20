@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a new project</div>
                    <div class="card-body">
                        <form action="{{ route('home', ['user' => $user]) }}" method="post">
                            {{-- Laravel method to protect against csrf --}}
                            @csrf

                            <div class="form-group row">
                            <label for="project_name" class="col-md-4 col-form-label text-md-right">{{__('Project Name')}}</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection