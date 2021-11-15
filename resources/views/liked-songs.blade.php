@extends('layout')
@section('content')
    <div class="container">
        <div class="tracks my-5">
            <h4>LIKED SONGS</h4>
            <div class="row mt-4">

                        @foreach($likes as $like)
                            <div class="track-item mb-2">
                                <img src="{{ $like->track->album->getFirstMediaUrl() }}">
                                <div class="track-info">
                                    <div class="track">
                                        <a class="text-decoration-none text-white"
                                           href="{{ route('tracks.show', ['trackId' => $like->track->id]) }}">
                                            {{ $like->track->name }}
                                        </a>

                                    </div>
                                    <div class="text-muted">
                                        <a class="text-decoration-none text-white"
                                           href="{{ route('artists.show', ['artistId' => $like->track->album->artist->id ]) }}">
                                        <span>
                                            {{ $like->track->album->artist->name }}
                                        </span>
                                        </a> -
                                        <a class="text-decoration-none text-muted"
                                           href="{{route('albums.show', ['albumId' => $like->track->album->id])}}">
                                            <span>{{ $like->track->album->name }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                @endforeach
            </div>
        </div>
    </div>


@endsection()
