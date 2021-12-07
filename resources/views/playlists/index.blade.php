@extends('layout')
@section('content')

    <div class="container py-5">
        <a class="nav-link active mb-5 btn btn-info text-white d-inline-block" aria-current="page"
           href="{{ route('playlist.create') }}">Playlist
            Create</a>

        <div class="row">
            @foreach($myPlaylists as $myPlaylist)
                <div class="col-sm-12 col-md-12 col-lg-4">
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
                            <div class="text-muted">{{ $myPlaylist->user->name }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection()
