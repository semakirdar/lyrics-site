@extends('layout')
@section('content')

    <div class="container">
        <div class="search py-5">
            <h3 class="my-3">TRACKS</h3>
            @foreach($trackSearch as $track)
                <div class="search-item">
                    <img src="{{ $track->album->cover }}">
                    <div>
                        <a href="{{ route('tracks.show', ['trackId' => $track->id]) }}">
                            <p>{{ $track->name }}</p>
                        </a>

                        <p>
                            <a href="{{ route('albums.show',['albumId' => $track->album->id])}}">{{ $track->album->name }}</a>
                            -
                            <span class="text-muted"> {{$track->album->artist->name}} </span>
                        </p>
                    </div>
                </div>
            @endforeach
            <h3 class="my-3">ALBUMS</h3>
            @foreach($albumSearch as $album)
                <div class="search-item">
                    <img src="{{ $album->cover }}">
                    <div>
                        <p>
                            <a href="{{ route('albums.show',['albumId' => $album->id])}}">{{ $album->name }}</a>
                        </p>
                    </div>
                </div>
            @endforeach
            @if(count($artistSearch)>0)
                <h3 class="my-3">ARTİSTS</h3>
                @foreach($artistSearch as $artist)
                    <div class="search-item">
                        <img src="{{ $artist->cover}}">
                        <div>
                            <a href="{{ route('artists.show', ['artistId' => $artist->id]) }}">
                                <p>{{ $artist->name }}</p>
                            </a>

                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

@endsection
