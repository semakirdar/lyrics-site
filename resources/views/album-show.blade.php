@extends('layout')
@section('content')
    <div class="container py-5">
        <div class="album-detail">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="album-detail-image">
                        <img class="img-fluid" src="{{ $album->cover }}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <h3>{{ $album->name }}</h3>
                    <div class="album-detail-info text-muted mt-3">
                        <div>
                            <span>{{ $album->is_single == 0 ?'Album' : 'Single' }}</span> -
                            <span>{{ $album->artist->name }}</span> -
                            <span>{{ $album->release_year }}</span>
                        </div>
                        <div class="mb-3">
                            {{ count($album->tracks) }} Şarkı
                        </div>
                        <div>
                            {{ $album->description }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="tracks mt-5">
                @foreach($album->tracks as $track)
                    <div class="track-item album-track-item {{ $track->is_liked == true ? 'is_liked' : ' ' }}">
                        <div class="d-flex justify-content-center">
                            <div class="text-muted me-5">{{  $loop->iteration }}</div>
                            <a class="text-decoration-none text-muted"
                               href="{{ route('tracks.show', ['trackId' => $track->id]) }}">
                                {{ $track->name }}
                            </a>
                        </div>

                        <div class="d-flex justify-content-center align-items-center">
                            <div class="like-button me-3">
                                <a class="text-white" data-bs-toggle="tooltip" data-bs-placement="top"
                                   title="Like"
                                   href="{{ route('tracks.like', ['trackId' => $track->id]) }}">
                                    <i class="far fa-thumbs-up"></i>
                                </a>
                            </div>

                            <div class="add-play-list-button" data-id="{{$track->id}}">
                                <a class="text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="playlist"
                                   href="javascript:;">
                                    <i class="far fa-plus-square"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection()
