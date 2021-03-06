<form action="{{ route('developers.search') }}" method="POST">
@csrf

    <div class="form-group">
        <label for="search" class="col-sm-2 col-form-label">Search</label>
        <input type="search" class="col-sm-9 @error('search') is-invalid @enderror" id='search' required name='search' placeholder='Enter full developer name here'>

        @error('search')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group row">
        @foreach($roles as $role)
            <div class="form-group col">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{$role->id}}">
                    <label class="form-check-label">{{$role->role}}</label>
                </div>
            </div>
        @endforeach
    </div>

    <button type="submit">Search</button>
</form>