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
            <a class="navbar-brand" href="#">MUSIC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Anasayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Keşfet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kitaplık</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Arayın</a>
                    </li>
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
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
