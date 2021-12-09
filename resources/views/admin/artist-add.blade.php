@extends('layout')
@section('content')

    <div class="artist-add">
        <form method="post" action="{{ route('api') }}">
            @csrf
            <div class="mb-3">
                <label>Artist Name</label>
                <input name="name">
            </div>

            <button class="btn btn-info">ADD</button>
        </form>
    </div>

@endsection()
