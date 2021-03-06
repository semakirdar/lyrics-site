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


            <form method="post" action="{{ route('search') }}">
                @csrf
                <div class="navbar-search">
                    <input name="search" type="search" class="form-control" placeholder="Search">
                </div>
            </form>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('all.playlists') }}">All
                            Playlists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('playlist.lists') }}">My
                            Playlists
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('liked.songs') }}">Liked Songs</a>
                    </li>
                    @auth()
                        @if( auth()->user()->is_admin )
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-info" data-bs-toggle="dropdown" href="#"
                                   role="button"
                                   aria-expanded="false">Admin</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <form method="post" action="{{ route('admin.mix.playlist') }}">
                                            @csrf
                                            <button class="dropdown-item">Mix Playlist</button>
                                        </form>

                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('admin.api.artists.add') }}">Artist
                                            Add</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('admin.albums.index') }}">Album List</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('admin.albums.create') }}">Album
                                            Create</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('admin.artists.index') }}">Artist
                                            List</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('admin.artists.create') }}">Artist
                                            Create</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('admin.tracks.create') }}">Track
                                            Create</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user"></i>
                                {{ auth()->user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logout-a" href="javascript:;">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                            <form type="hidden" class="logout-form" method="post" action="{{ route('logout') }}">
                                @csrf
                            </form>
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

@auth
    <div class="container">
        <div class="playlist-modal py-5">
            <div id="playlist-list">
                <div class="card">
                    <div class="card-header">
                        <h6>Playlist</h6>
                    </div>
                    <div class="card-body">
                        @if(isset($layoutPlaylists))
                            @foreach($layoutPlaylists as $playlist)
                                <div class="playlist-item mb-4">
                                    <div class="album-cover">
                                        @foreach($playlist->tracks->take(4) as $track)
                                            <div class="album-image">
                                                <a href="{{ route('playlist.show', ['playlistId' => $playlist->id]) }}">
                                                    <img src="{{ $track->album->getFirstMediaUrl() }}">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="album-info">
                                        <a class="play-list-name text-decoration-none text-white"
                                           data-id="{{$playlist->id}}"
                                           href="javascript:;">
                                            {{ $playlist->name }}
                                        </a>
                                        <div class="track-count">{{ count($playlist->tracks)}} Tracks</div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <form method="post" action="{{ route('playlist.track.add') }}" id="playlistForm">
                            @csrf
                            <input id="playlistId" name="playlist_id" type="hidden">
                            <input id="trackId" name="track_id" type="hidden">
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="#" id="playlistAdd">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div id="playlist-create">
                <div class="container">
                    <div class="new-create">
                        <div class="card">
                            <div class="card-header">Playlist Create</div>
                            <div class="card-body">
                                <form method="post" action="{{route('playlist.store')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input class="form-control" name="name">
                                    </div>
                                    <button class="btn btn-info">CREATE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endauth

<script src="{{ asset('js/app.js') }}"></script>


@if ($errors->any())
    <script>toastr.error('{{ implode(",", $errors->all()) }}')</script>
@else
    @if (session('success'))
        <script>toastr.success('{{ session('success') }}')</script>
    @endif
@endif
</body>
</html>
