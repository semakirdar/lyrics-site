@extends('layout')
@section('content')

    <div class="track-detail">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div>
                        <img class="img-fluid" src="{{ $track->album->getFirstMediaUrl() }}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <h3>SONG LYRICS</h3>
                    <div class="track-lyrics mt-3">
                        {!! $track->lyric !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
