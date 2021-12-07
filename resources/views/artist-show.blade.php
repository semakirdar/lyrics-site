@extends('layout')
@section('content')

    <div class="artist-detail">
        <div class="artist-detail-image">
            @if(!empty($artist->getFirstMediaUrl() ))
                <img src="{{ $artist->getFirstMediaUrl() }}">
            @else
                <img src="{{ asset('images/album-kapak.jpeg') }}">
            @endif
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
                    <div class="row">
                        @foreach($albums as $album)
                            <div class="col-sm-12 col-md-12 col-lg-3">
                                <div class="album-item mb-4">

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
        </div>

    </div>

@endsection()
