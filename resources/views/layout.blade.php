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
    <nav>
        <div class="nav-top d-flex justify-content-between">
            <div class="container d-flex justify-content-between">
                <ul class="nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('admin.artists.create') }}">Artist Add</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.albums.create') }}">Album Add</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.albums.index') }}">Album List</a></li>
                            <li><a class="dropdown-item" href="#">Track Add</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                </ul>

                <form class="d-flex justify-content-between">
                    <input class="form-control" type="search" aria-label="Search">
                    <button class="btn btn-primary text-white" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="nav-bottom">

        </div>
    </nav>
</header>

<div>
    @yield('content')
</div>

<footer>
    <nav>
        <div class="nav-top">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center">
                    <p>Submit Lyrics</p>
                    <p>Soundtracks</p>
                    <p>Facebook</p>
                    <p>Contact Us</p>
                </div>
            </div>
        </div>
        <div class="nav-bottom">

        </div>
    </nav>
</footer>


<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
