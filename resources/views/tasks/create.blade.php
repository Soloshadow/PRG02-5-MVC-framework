@extends('layouts.app');

@section('content')
    <div class="container">
        <div>Add task to the project</div>
    
        <form action="{{ route('tasks.store',['user' =>Auth::id(),'project' =>  $id]) }}" method="POST" class="pb-5">
            @csrf
    
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="task_name">Task</label>
                    <input type="text" class="form-control @error('task') is-invalid @enderror" name="task_name" required>
                    @error('task')
                        <span class="invalid-feedback" role='alert'><strong>{{$message}}</strong></span>
                    @enderror
                    </div>
                <div class="form-group col-md-3">
                    <label for="moscow">MoSCoW</label>
                    <select id="moscow" class="form-control @error('moscow') is-invalid @enderror" name='moscow'>
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