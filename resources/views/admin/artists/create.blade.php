@extends('layout')
@section('content')

    <div class="container">
        <div class="new-create">
            <form method="post" action="{{route('admin.artists.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>name</label>
                    <input class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label>bio</label>
                    <input class="form-control" name="bio">
                </div>
                <div class="mb-3">
                    <label>country</label>
                    <input class="form-control" name="country">
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button class="btn btn-info">CREATE</button>
            </form>
        </div>
    </div>

@endsection
