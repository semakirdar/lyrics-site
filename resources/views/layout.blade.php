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
        <div class="nav-top">
            <div class="container">
                <form class="d-flex justify-content-end">
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
                <div class="d-flex justify-content-center ali">
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
