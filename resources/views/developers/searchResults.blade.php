@extends('layouts.app');

@section('content')

<div class="container">
    <h1>Your search results</h1>
    <hr />
    @if ($developers != null)
        {{ $developers->name }} - {{ $roles }}
    @else 
        There is no developer by that name and position
    @endif
</div>

@endsection