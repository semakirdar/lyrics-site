@extends('layout')
@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class="playlist-item mb-5">
                <div class="album-cover">
                    @foreach($playlist->tracks->take(4) as $track)
                        <div class="album-image">
                            <img src="{{ $track->album->cover¬ }}">
                        </div>
                    @endforeach
                </div>
                <div class="album-info">

                    {{ $playlist->name }}

                    <div class="track-count">{{ count($playlist->tracks)}} Tracks</div>
                    <div class="text-muted">{{ $playlist->user->name }}</div>
                </div>
            </div>
            <div>
                <form class="playlist-delete" method="post"
                      action="{{ route('playlist.delete', [ 'id' => $playlist->id]) }}">
                    @csrf
                    <button class="btn btn-info text-white">Playlist Delete</button>
                </form>
            </div>
        </div>

        <div class="album-detail">
            <div class="tracks mt-5">
                @foreach($playlist->tracks as $track)
                    <div class="track-item album-track-item {{ $track->is_liked == true ? 'is_liked' : ' ' }}">
                        <div class="d-flex justify-content-center">
                            <div class="text-muted me-5">{{  $loop->iteration }}</div>
                            <a class="text-decoration-none text-muted"
                               href="{{ route('tracks.show', ['trackId' => $track->id]) }}">
                                {{ $track->name }}
                            </a>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="like-button me-3">
                                <a class="text-white"
                                   href="{{ route('tracks.like', ['trackId' => $track->id]) }}">
                                    <i class="far fa-thumbs-up"></i>
                                </a>
                            </div>
                            <div class="track-delete">
                                <form method="post"
                                      action="{{ route('playlist.track.delete', ['trackId' => $track->id]) }}">
                                    @csrf
                                    <button class=" btn text-white">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection()
