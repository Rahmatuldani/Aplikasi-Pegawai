<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Manajemen Pegawai</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-100">
    <nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-info">
        <a href="#" class="navbar-brand">Manajemen Pegawai</a>
        <button type="button" class="navbar-toggler" data-toogle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <nav class="collapse navbar-collapse" id="sidebar">
            <ul class="navbar-nav d-sm-none">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link text-white"><i class="oi oi-dashboard"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pegawai.index') }}" class="nav-link text-white"><i class="oi oi-person"></i>Data Pegawai</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jabatan.index') }}" class="nav-link text-white"><i class="oi oi-sort-descending"></i>Data Jabatan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link text-white"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit(); "><i class="oi oi-account-logout"></i>Logout</a>
                </li>
            </ul>
        </nav>
    </nav>

    <div class="container-fluid h-100">
        <div class="row h-100">
            <nav class="col-md-2 col-sm-3 bg-dark h-100 p-0 position-fixed d-none d-sm-block">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-dark">
                        <a href="{{ route('home') }}" class="nav-link text-white"><i class="oi oi-dashboard"></i>Dashboard</a>
                    </li>
                    <li class="list-group-item bg-dark">
                        <a href="{{ route('pegawai.index') }}" class="nav-link text-white"><i class="oi oi-person"></i>Data Pegawai</a>
                    </li>
                    <li class="list-group-item bg-dark">
                        <a href="{{ route('jabatan.index') }}" class="nav-link text-white"><i class="oi oi-sort-descending"></i>Data Jabatan</a>
                    </li>
                    <li class="list-group-item bg-dark">
                        <a href="{{ route('logout') }}" class="nav-link text-white"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit(); "><i class="oi oi-account-logout"></i>Logout</a>
                    </li>
                </ul>
            </nav>       
            
            <div class="col-md-10 col-sm-9 offset-md-2 offset-sm-3 mb-3">
                <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <section>
                    @yield('content')
                </section>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') "></script>
</body>
</html>
