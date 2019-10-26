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
                    <input type="text" class="form-control" name="task" id="inputTask">
                    </div>
                <div class="form-group col-md-3">
                    <label for="moscow">MoSCoW</label>
                    <select id="moscow" class="form-control" name='MoSCoW'>
                        <option selected value=null>Choose...</option>
                        <option value="M">Must have</option>
                        <option value="S">Should have</option>
                        <option value="C">Could have</option>
                        <option value="W">Would have</option>
                    </select>
                </div>  
                <div class="form-group col-md-3">
                    <label for="progress">progress</label>
                    <select id="progress" class="form-control" name='progress'>
                        <option selected value=null>Choose...</option>
                        <option value="not started">Not started</option>
                        <option value="doing">Doing</option>
                        <option value="done">Done</option>
                    </select>
                </div> 
            </div>

            <button type="submit">Add</button>
        </form>

    </div>

@endsection