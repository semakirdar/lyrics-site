@extends('layout')
@section('content')

    <div class="container py-5">
        @foreach($myPlaylists as $myPlaylist)
            <div class="playlist-item mb-5">
                <div class="album-cover">
                    @foreach($myPlaylist->tracks->take(4) as $track)
                        <div class="album-image">
                            <img src="{{ $track->album->getFirstMediaUrl() }}">
                        </div>
                    @endforeach
                </div>
                <div class="album-info">
                    <a class="play-list-name text-decoration-none text-white" data-id="{{$myPlaylist->id}}"
                       href="{{ route('playlist.show', ['playlistId' => $myPlaylist->id]) }}">
                        {{ $myPlaylist->name }}
                    </a>
                    <div class="track-count">{{ count($myPlaylist->tracks)}} Tracks</div>
                </div>
            </div>
        @endforeach
    </div>

@endsection()
