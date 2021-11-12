@extends('layout')
@section('content')


    <div class="container">

        <div class="album-tracks text-center py-4">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="mb-3 ">
                        <img class="img-fluid" src="{{ $album->getFirstMediaUrl() }}">
                    </div>
                    <div class="mb-3">
                        <h2>{{ $album->name }}</h2>
                    </div>
                    <div class="mb-3">
                        <span>{{ $album->artist->name }}</span>
                    </div>
                    <div class="mb-5">
                        <span>{{ $album->description }}</span>
                    </div>

                    @foreach($album->tracks as $track)
                        <div class="album-song-item mb-3">
                            <a href="#">{{ $track->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection()
