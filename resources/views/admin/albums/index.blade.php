@extends('layout')
@section('content')

    <div class="container">
        <div class="album-list py-5">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Artist</th>
                    <th>Record label</th>
                    <th>Name</th>
                    <th>Single</th>
                    <th>Action</th>
                </tr>
                @foreach($albums as $album)
                    <tr>
                        <td>{{ $album->id }}</td>
                        <td>{{ $album->artist_id }}</td>
                        <td>{{ $album->record_label_id }}</td>
                        <td>{{ $album->name }}</td>
                        <td>{{ $album->is_single }}</td>
                        <td><a href="{{ route('admin.albums.edit', ['id' => $album->id]) }}"
                               class="btn btn-sm btn-dark">Edit</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
