@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            {{-- {{$developers}} --}}

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.store', ['user' =>Auth::id()]) }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="project_name" class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="project_name" type="text" class="form-control @error('project_name') is-invalid @enderror" name="project_name" value="{{ old('project_name') }}" required autocomplete="project_name" autofocus>
    
                                    @error('project_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>

                            <h4 class="text-center">People associated with this project:</h4>
                            @foreach($developers as $developer)
                                <div class="form-group row col-md-8 m-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="developers[]" value="{{$developer->id}}">
                                        <label class="form-check-label">{{$developer->name}} - {{$developer->role->role}}</label>
                                    </div>
                                </div>
                                <hr/>
                            @endforeach

                            @error('developers')
                                <span class="invalid-feedback" role='alert'><strong>{{ $message }}</strong></span>
                            @enderror
                              
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection