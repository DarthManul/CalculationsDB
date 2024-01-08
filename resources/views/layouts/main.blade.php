<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-brand">
                    <div class="container-fluid">

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item"><a class="nav-link" href={{route('main.index')}}>Главная страница</a></li>
                                <li class="nav-item"> <a class="nav-link" href={{route('calculation.index')}}>Список расчётов</a> </li>
                                <li class="nav-item"><a class="nav-link" href={{route('auth.index')}}>Войти или зарегистрироваться</a> <li>
                        </div>
                    </div>
                </nav>
            </div>
            @yield('content')
        </div>
    </body>
</html>
