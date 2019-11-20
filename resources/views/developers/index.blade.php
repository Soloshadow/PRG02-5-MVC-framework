@extends('layouts.app');

@section('content')

<div class="container">
    <h1>List of developers currently working here</h1>
    <hr/>

    @include('developers.searchform')

    <hr/>
    <ul>
        @foreach($developers as $developer)
            <li>
                {{ $developer->name}} - {{ $developer->role->role}}
            </li>
        @endforeach
    </ul>
</div>

@endsection
