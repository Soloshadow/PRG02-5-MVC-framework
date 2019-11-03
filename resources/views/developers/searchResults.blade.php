@extends('layouts.app');

@section('content')

<div class="container">
    <h1>Your search results</h1>
    <hr />

    {{ $developers->name }} - {{ $roles }}
</div>

@endsection