@extends('layout')
@section('content')

    <div class="artist-detail">
        <div class="artist-detail-image">
            <img src="{{ $artist->getFirstMediaUrl() }}">
        </div>
        <div class="container">
            <h3>{{ $artist->name }}</h3>
            <div>
                {{$artist->bio}}
            </div>
            <div class="tracks mt-5">
                @foreach($tracks as $track)
                    <div class="track-item">
                        <div class="text-muted me-5">{{  $loop->iteration }}</div>
                        <div>{{ $track->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection()
