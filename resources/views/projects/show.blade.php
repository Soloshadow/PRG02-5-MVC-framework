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
                
        <div>Add task to the project</div>

        <form action="{{ route('task.store',['user' =>Auth::id(),'id' =>  $project->id]) }}" method="POST" class="pb-5">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputTask">Task</label>
                    <input type="text" class="form-control @error('task') is-invalid @enderror" name="task" required>
                    @error('task')
                        <span class="invalid-feedback" role='alert'><strong>{{$message}}</strong></span>
                    @enderror
                    </div>
                <div class="form-group col-md-3">
                    <label for="moscow">MoSCoW</label>
                    <select id="moscow" class="form-control @error('moscow') is-invalid @enderror" name='moscow'>
                        <option selected value="">Choose...</option>
                        <option value="M">Must have</option>
                        <option value="S">Should have</option>
                        <option value="C">Could have</option>
                        <option value="W">Would have</option>
                    </select>
                    @error('moscow')
                        <span class="invalid-feedback" role='alert'><strong>{{$message}}</strong></span>
                    @enderror
                </div>  
                <div class="form-group col-md-3">
                    <label for="progress">progress</label>
                    <select id="progress" class="form-control @error('progress') is-invalid @enderror" name='progress'>
                        <option selected value="">Choose...</option>
                        <option value="not started">Not started</option>
                        <option value="doing">Doing</option>
                        <option value="done">Done</option>
                    </select>
                    @error('progress')
                        <span class="invalid-feedback" role='alert'><strong>{{$message}}</strong></span>
                    @enderror
                </div> 
            </div>

            <button type="submit">Add</button>
        </form>

    </div>

@endsection