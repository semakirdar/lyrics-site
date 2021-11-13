@extends('layout')
@section('content')

    <div class="container py-5">
        <div class="tracks mb-5">
            <h4>LAST SONGS</h4>
            <div class="row mt-4">
                @foreach($tracks->chunk(4) as $chunk)
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        @foreach($chunk as $track)
                            <div class="track-item mb-2">
                                <img src="{{ $track->album->getFirstMediaUrl() }}">
                                <div class="track-info">
                                    <div class="track">{{ $track->name }}</div>
                                    <div class="text-muted">
                                        <a class="text-decoration-none text-white"
                                           href="{{ route('artists.show', ['artistId' => $track->album->artist->id ]) }}">
                                        <span>
                                            {{ $track->album->artist->name }}
                                        </span>
                                        </a> -
                                        <a class="text-decoration-none text-muted"
                                           href="{{route('albums.show', ['albumId' => $track->album->id])}}">
                                            <span>{{ $track->album->name }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <h4>LAST ALBUMS</h4>
            <div class="albums mt-5">
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
@endsection
