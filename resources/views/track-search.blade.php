@extends('layout')
@section('content')

    <div class="container">
        <div class="search py-5">
            @foreach($trackSearch as $track)
                <div class="search-item">
                    <img src="{{ $track->album->getFirstMediaUrl() }}">
                    <div>
                        <p>{{ $track->name }}</p>
                        <p>{{ $track->album->name}} - <span class="text-muted"> {{$track->album->artist->name}} </span>
                        </p>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection
