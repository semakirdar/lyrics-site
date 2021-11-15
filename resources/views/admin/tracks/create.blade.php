@extends('layout')
@section('content')

    <div class="container">
        <div class="new-create">
            <form method="post" action="{{route('admin.tracks.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>name</label>
                    <input class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <select class="form-control" name="genre_id">
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-control" name="album_id">
                        @foreach($albums as $album)
                            <option value="{{ $album->id }}">{{ $album->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>lyric</label>
                    <textarea class="form-control" name="lyric"></textarea>
                </div>

                <button class="btn btn-info">CREATE</button>
            </form>
        </div>
    </div>

@endsection
