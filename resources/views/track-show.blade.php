@extends('layout')
@section('content')

    <div class="track-detail">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div>
                        <h3>{{ $track->name }}</h3>
                        <p>{{ $track->album->artist->name }}</p>
                        <img class="img-fluid" src="{{ $track->album->getFirstMediaUrl() }}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <h3>SONG LYRICS</h3>
                    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-white" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Lyrics
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-white" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Songs
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                             aria-labelledby="home-tab">
                            {!! $track->lyric !!}</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            @foreach($track->album->tracks as $trackItem)
                                <div class="song-item mb-3">
                                    <img src="{{ $track->album->getFirstMediaUrl() }}">
                                    <p>
                                        <a class="text-decoration-none text-white"
                                           href="{{ route('tracks.show', ['trackId' => $trackItem->id]) }}">
                                            {{ $trackItem->name }}
                                        </a>
                                    </p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
