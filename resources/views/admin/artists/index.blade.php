@extends('layout')
@section('content')

    <div class="container">
        <div class="album-list py-5">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Bio</th>
                    <th>Country</th>
                    <th>Action</th>
                </tr>
                @foreach($artists as $artist)
                    <tr>
                        <td>{{ $artist->id }}</td>
                        <td>{{ $artist->name}}</td>
                        <td>{{ $artist->bio }}</td>
                        <td>{{ $artist->country }}</td>
                        <td><a href="{{ route('admin.artists.edit', ['id' => $artist->id]) }}"
                               class="btn btn-sm btn-dark">Edit</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
