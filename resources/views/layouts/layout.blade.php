<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('icons/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('/js/other/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('/js/cookie.js') }}"></script>

    @yield('head')
<!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(89661350, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/89661350" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<header>
    <nav class="navbar navbar-expand-lg navbarMenuMain">
        <div class="container-fluid">
            <button class="navbar-toggler  boxShadNone" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon navbarTogIcon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link menuLink" href="{{ route('cv.index') }}">{{ __('messages.nav_cv') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menuLink" href="{{ route('contact.index') }}">{{ __('messages.nav_contact_form') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menuLink" href="{{ route('article.index') }}">{{ __('messages.nav_blog') }}</a>
                    </li>
                    <div class="dropdown menuLink">
                        <button class="btn btn-outline-danger dropdown-toggle langdrop " type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="worldImg" alt="download" src="/img/world.png">
                            @if(str_replace('_', '-', app()->getLocale()) == 'en')
                                English
                            @elseif(str_replace('_', '-', app()->getLocale()) == 'pl')
                                Polski
                            @elseif(str_replace('_', '-', app()->getLocale()) == 'ru')
                                Русский
                            @endif
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item navItemLogoFailMenu" href="{{ route('locale', ['locale' => 'pl']) }}">Polski</a>
                            <a class="dropdown-item navItemLogoFailMenu"
                               href="{{ route('locale', ['locale' => 'en']) }}">English</a>
                            <a class="dropdown-item navItemLogoFailMenu"
                               href="{{ route('locale', ['locale' => 'ru']) }}">Русский</a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    @yield('header')
</header>
<body>
    <main class="bodyContent mt-5">
        @yield('content')
    </main>
    <script src="{{ asset('/bootstrap-5.0.2/js/bootstrap.bundle.min.js') }}" ></script>
</body>
<footer>
    @extends('layouts.footer')
</footer>
</html>
