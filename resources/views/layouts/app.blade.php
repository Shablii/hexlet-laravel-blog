<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hexlet Blog - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        <header class="flex-shrink-0">
                <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                    <a class="navbar-brand" href="/">Гланая</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link
                                {{ request()->routeIs('about') ? 'active' : '' }}
                                " href="{{route('about')}}">О блоге</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link
                                {{ request()->routeIs('articles.index') ? 'active' : '' }}
                                "href="{{route('articles.index')}}">Список статей</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ request()->routeIs('articles.create') ? 'active' : ''}}"href="{{route('articles.create')}}">Добавить статью</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
        <div class="container mt-4">
            <h1>@yield('header')</h1>
            <div>
                @if(Session::has('flash_message'))
                    <div class="alert alert-{{ session('flash_message')['class'] }}">
                        {{ session('flash_message')['message'] }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </body>
</html>


