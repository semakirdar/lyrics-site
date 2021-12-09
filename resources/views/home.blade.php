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
                                @if( !empty( $track->album->getFirstMediaUrl() ))
                                    <img src="{{ $track->album->getFirstMediaUrl() }}">
                                @else
                                    <img src="{{ asset('images/default-cover.jpeg')}}">
                                @endif
                                <div class="track-info">
                                    <div class="track">
                                        <a class="text-decoration-none text-white"
                                           href="{{ route('tracks.show', ['trackId' => $track->id]) }}">
                                            {{ $track->name }}
                                        </a>
                                    </div>
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
                <div class="row">
                    @foreach($albums as $album)
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <div class="album-item">
                                <a href="{{route('albums.show', ['albumId' => $album->id])}}">
                                    @if(!empty($album->getFirstMediaUrl()))
                                        <img src="{{ $album->getFirstMediaUrl() }}">
                                    @else
                                        <img src="{{ asset('images/default-cover.jpeg') }}">
                                    @endif
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
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="artists py-5">
            <h4>ARTİSTS</h4>
            <div class="row">
                @foreach($artists as $artist)
                    <div class="col-sm-12 col-md-12 col-lg-3">
                        <div class="artist-item my-4">
                            <div class="artist-image">
                                <a href="{{ route('artists.show', ['artistId' => $artist->id]) }}">
                                    <img class="img-fluid" src="{{ $artist->getFirstMediaUrl() }}">
                                </a>
                            </div>
                            <div class="text-center mt-3">
                                <p>{{ $artist->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
