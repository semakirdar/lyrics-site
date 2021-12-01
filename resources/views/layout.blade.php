<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lyrics</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">MUSIC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('playlist.create') }}">Playlist
                            Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('liked.songs') }}">Liked Songs</a>
                    </li>
                    @auth()
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-info" data-bs-toggle="dropdown" href="#"
                               role="button"
                               aria-expanded="false">Admin</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('admin.albums.index') }}">Album List</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('admin.albums.create') }}">Album Create</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('admin.artists.index') }}">Artist List</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('admin.artists.create') }}">Artist
                                        Create</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('admin.tracks.create') }}">Track Create</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user"></i>
                                {{ auth()->user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>
                    @endauth()
                    @guest()
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-user"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i>
                            </a>
                        </li>
                    @endguest()
                </ul>
            </div>
        </div>
    </nav>
</header>
<div>
    @yield('content')
</div>
<footer>
</footer>

<div class="container">
    <div class="playlist-modal py-5">
        <div class="card">
            <div class="card-header">
                <h6>Playlist</h6>
            </div>
            <div class="card-body">
                <div>
                    @foreach($playlists as $playlist)
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="">
                            </div>
                        </div>
                        <a class="play-list-name" data-id="{{$playlist->id}}" href="javascript:;">
                            {{ $playlist->name }}
                        </a>
                    @endforeach
                    <form method="post" action="{{ route('playlist.track.add') }}" id="playlistForm">
                        @csrf
                        <input id="playlistId" name="playlist_id" type="hidden">
                        <input id="trackId" name="track_id" type="hidden">
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <a href="#">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
