@extends('layout')
@section('content')

    <div class="container">
        <div class="all-playlists">
            @foreach($playlists as $playlist)
                <div class="d-flex justify-content-between align-items-center">
                    <div class="playlist-item mb-5">
                        <div class="album-cover">
                            @foreach($playlist->tracks->take(4) as $track)
                                <div class="album-image">
                                    <img src="{{ $track->album->getFirstMediaUrl() }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="album-info">
                            {{ $playlist->name }}
                            <div class="track-count">{{ count($playlist->tracks)}} Tracks</div>
                            <div class="text-muted">{{ $playlist->user->name }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $playlists->links() }}

    </div>


@endsection
