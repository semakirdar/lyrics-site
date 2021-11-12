@extends('layout')
@section('content')
    <div class="container">
        <div class="new-create">
            <form method="post" action="{{ route('admin.albums.update', ['id' => $album->id]) }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>artist</label>
                    <select class="form-control" name="artist_id">
                        @foreach($artists as $artist)
                            <option
                                {{ $album->artist_id == $artist->id ? 'selected' : '' }} value="{{ $artist->id }}">{{ $artist->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{ $album->name }}">
                </div>
                <div class="mb-3">
                    <label>release Year</label>
                    <input class="form-control" name="release_year" value="{{ $album->release_year}}">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{ $album->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Record</label>
                    <select class="form-control" name="recordLabel_id">
                        @foreach($records as $record)
                            <option
                                {{ $album->record_label_id == $record->id ? 'selected' : ''}} value="{{ $record->id }}">{{ $record->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Single</label>
                    <input name="is_single" type="checkbox">
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button class="btn btn-primary">CREATE</button>
            </form>
        </div>
    </div>
@endsection
