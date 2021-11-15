@extends('layout')
@section('content')
    <div class="container">
        <div class="new-create">
            <form method="post" action="{{ route('admin.artists.update', ['id' => $artist->id]) }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{ $artist->name }}">
                </div>
                <div class="mb-3">
                    <label>Bio</label>
                    <input class="form-control" name="bio" value="{{ $artist->bio }}">
                </div>
                <div class="mb-3">
                    <label>Country</label>
                    <input class="form-control" name="country" value="{{ $artist->country }}">
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button class="btn btn-info">EDIT</button>
            </form>
        </div>
    </div>
@endsection
