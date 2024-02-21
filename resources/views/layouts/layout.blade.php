<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Daily Grow</title>

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-lg-2 navbar-container bg-light p-3">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="#">Daily Grow</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <!-- Вертикальное меню -->
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('client.all') }}">Клиенты</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('sending.create') }}">Расслыки</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('statistics.index') }}">Статистика</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-10 col-lg-10 content-container content-box">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
