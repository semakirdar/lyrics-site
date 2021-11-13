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
            <div class="tracks my-5">
                @foreach($tracks as $track)
                    <div class="track-item">
                        <div class="text-muted me-5">{{  $loop->iteration }}</div>
                        <div>{{ $track->name }}</div>
                    </div>
                @endforeach
            </div>

            <div>

                <div class="albums my-5">
                    @foreach($albums as $album)
                        <div class="album-item">
                            <a href="{{route('albums.show', ['albumId' => $album->id])}}">
                                <img src="{{ $album->getFirstMediaUrl() }}">
                            </a>
                            <div class="album-info mt-3">
                                <div>
                                    <a class="text-decoration-none text-white"
                                       href="{{route('albums.show', ['albumId' => $album->id])}}">
                                        {{$album->name}}
                                    </a>
                                </div>
                                <div class="text-muted">
                                    <span>{{ $album->is_single == 0 ?'Album' : 'Single' }}</span> -
                                    <span>
                                    <a class="text-decoration-none text-white"
                                       href="{{ route('artists.show', ['artistId' => $album->artist->id ]) }}">
                                        {{ $album->artist->name }}
                                    </a>
                                </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

@endsection()
