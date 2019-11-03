{{ $u }}

<hr />
@foreach($u as $i)

<div> {{ $i->users }} </div> <br />

<div> {{ $i->tasks }} </div> <br />

<hr />
    @foreach($i->users as $user)
        {{ $user->name }}
        {{ $user->role->role }}
        <hr />
    @endforeach

@endforeach