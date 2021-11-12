@extends('layout')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="home d-flex justify-content-center align-items-center pt-5">
                    <div class="col-lg-4 text-center">
                        <h1>WELCOME</h1>
                        <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                            scrambled</p>
                    </div>
                </div>
                <div class="hot-songs text-center pt-5">
                    <h2>HOT SONGS</h2>
                    <div class="row justify-content-center pt-3">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="hot-song-item">
                                <a href="#">Adele - Easy On Me</a>
                            </div>
                            <div class="hot-song-item">
                                <a href="#">Adele - Easy On Me</a>
                            </div>
                            <div class="hot-song-item">
                                <a href="#">Adele - Easy On Me</a>
                            </div>
                            <div class="hot-song-item">
                                <a href="#">Adele - Easy On Me</a>
                            </div>
                            <div class="hot-song-item">
                                <a href="#">Adele - Easy On Me</a>
                            </div>
                            <div class="hot-song-item">
                                <a href="#">Adele - Easy On Me</a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="hot-song-item">
                                <a href="#">Adele - Easy On Me</a>
                            </div>
                            <div class="hot-song-item">
                                <a href="#">Adele - Easy On Me</a>
                            </div>
                            <div class="hot-song-item">
                                <a href="#">Adele - Easy On Me</a>
                            </div>
                            <div class="hot-song-item">
                                <a href="#">Adele - Easy On Me</a>
                            </div>
                            <div class="hot-song-item">
                                <a href="#">Adele - Easy On Me</a>
                            </div>
                            <div class="hot-song-item">
                                <a href="#">Adele - Easy On Me</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hot-albums text-center py-5">
                    <h2>HOT ALBUMS</h2>
                    <div class="row pt-3">
                        @foreach($albums as $album)
                            <div class="col-sm-12 col-md-12 col-lg-3">
                                <div class="hot-albums-item">
                                    <div class="album-image">
                                        <a href="#">
                                            <img src="{{ asset('images/album-image.jpeg') }}">
                                        </a>
                                    </div>
                                    <div class="album-text mt-3">
                                        <a href="#">
                                            <p>{{$album->name}}</p>
                                        </a>
                                        <a href="#">
                                            <p class="artist-name">{{ $album->artist->name }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
