@extends('layout')
@section('content')

    <div class="container">
        <div class="search py-5">
            @foreach($trackSearch as $track)
                <div class="search-item">
                    <img src="{{ $track->album->getFirstMediaUrl() }}">
                    <div>
                        <a href="{{ route('tracks.show', ['trackId' => $track->id]) }}">
                            <p>{{ $track->name }}</p>
                        </a>

                        <p><a href="{{ route('albums.show')}}">{{ $track->album->name }}</a> -
                            <span class="text-muted"> {{$track->album->artist->name}} </span>
                        </p>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection
