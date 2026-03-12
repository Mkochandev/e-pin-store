<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'E-Pin Store')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('epin-assets/images/icons/favicon.png') }}">

    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '{{ asset('epin-assets/js/webfont.js') }}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="stylesheet" href="{{ asset('epin-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('epin-assets/css/demo31.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('epin-assets/vendor/fontawesome-free/css/all.min.css') }}">
</head>

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="{{ route('home') }}" class="logo">
                            <img src="
                            @if($logo && $logo->logo)
                                {{ asset('upload/about/' . $logo->logo) }}
                            @else
                                {{ asset('epin-assets/images/logo.png') }}
                            @endif" alt="Porto Logo">
                        </a>
                    </div>

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="{{ Request::routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Anasayfa</a>
                                </li>
                                <li class="{{ Request::routeIs('shop') ? 'active' : '' }}">
                                    <a href="{{ route('shop') }}"><i class="icon-joystick"></i> Oyunlar</a>
                                </li>
                                <li class="{{ Request::routeIs('about') ? 'active' : '' }}">
                                    <a href="{{ route('about') }}">Hakkımızda</a>
                                <li class="{{ Request::routeIs('contact') ? 'active' : '' }}">
                                    <a href="{{ route('contact') }}">İletişim</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="header-right">

                        <div class="header-icon  header-search header-search-popup d-none d-sm-block mb-0">
                            <a href="#" class="search-toggle" role="button"><i class="fas fa-search"></i></a>
                            <form action="{{ route('shop') }}" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" placeholder="Oyun ara..."
                                        required>
                                    <button class="btn icon-search-3" type="submit"></button>
                                </div>
                            </form>
                        </div>
                        @if (auth()->check())
                            <a href="{{ route('profile.wishlist') }}" class="header-icon  mb-0" title="Favorilerim"><i
                                    class="fas fa-heart"></i></a>
                        @else
                            <a href="{{ route('login') }}" class="header-icon  mb-0" title="Giriş Yap"><i
                                    class="fas fa-heart"></i></a>
                        @endif


                        @if (Auth::check())
                            <a href="{{ route('profile') }}" class="header-icon  mb-0" title="Profilim"><i
                                    class="fas fa-user"></i>
                            </a>
                            <a href="{{ route('logout') }}" class="header-icon  mb-0" title="Çıkış Yap"><i
                                    class="fas fa-sign-out-alt"></i></a>
                        @elseif (!Auth::check())
                            <a href="{{ route('login') }}" class="header-icon  mb-0" title="Giriş Yap"><i
                                    class="fas fa-sign-in-alt"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </header>
