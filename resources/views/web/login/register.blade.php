<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giriş Yap - E-Pin Store</title>

    <link rel="stylesheet" href="{{ asset('epin-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('epin-assets/css/demo31.min.css') }}">
    <link rel="stylesheet" href="{{ asset('epin-assets/vendor/fontawesome-free/css/all.min.css') }}">
    <style>
    .alert-danger {
        background-color: #ff4d4d !important;/
        color: white !important;
        border: none;
        font-size: 14px;
    }
    .form-control.is-invalid {
        border-color: #ff4d4d !important;
    }
</style>
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
                            <img src="{{ asset('epin-assets/images/logo-white.png') }}" alt="E-Pin Store Logo">
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
                </div>
            </div>
        </header>
        <main class="main" style="background-color: #f4f7f6; padding: 60px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-sm" style="border-radius: 15px; background: #fff; padding: 40px;">
                    <h2 class="text-center mb-4" style="color: #222; font-weight: 700;">Hesap Oluştur</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger" style="background-color: #e74c3c; color: #fff; border: none; border-radius: 8px; margin-bottom: 25px; padding: 15px;">
                            <ul class="mb-0" style="list-style: none; padding-left: 0;">
                                @foreach ($errors->all() as $error)
                                    <li><i class="fas fa-exclamation-triangle mr-2"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark" style="font-size: 15px;">Ad Soyad</label>
                            <input type="text" name="name" class="form-control" 
                                   style="height: 50px; font-size: 16px; color: #111 !important; border: 2px solid #eee; background: #fafafa; border-radius: 8px;" 
                                   required autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark" style="font-size: 15px;">E-posta Adresi</label>
                            <input type="email" name="email" class="form-control" 
                                   style="height: 50px; font-size: 16px; color: #111 !important; border: 2px solid #eee; background: #fafafa; border-radius: 8px;" 
                                   required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark" style="font-size: 15px;">Parola</label>
                            <input type="password" name="password" class="form-control" 
                                   style="height: 50px; font-size: 16px; color: #111 !important; border: 2px solid #eee; background: #fafafa; border-radius: 8px;" 
                                   required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-dark" style="font-size: 15px;">Parola Tekrar</label>
                            <input type="password" name="password_confirmation" class="form-control" 
                                   style="height: 50px; font-size: 16px; color: #111 !important; border: 2px solid #eee; background: #fafafa; border-radius: 8px;" 
                                   required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block" style="height: 55px; font-size: 18px; font-weight: 700; border-radius: 8px; text-transform: uppercase;">
                            Kayıt Ol
                        </button>
                    </form>

                    <p class="mt-4 text-center text-muted">Zaten hesabınız var mı? <a href="{{ route('login') }}" class="text-primary font-weight-bold">Giriş Yap</a></p>
                </div>
            </div>
        </div>
    </div>
</main>
        <footer class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="footer-left nav-links">
                        <a href="#">Hesabım</a>
                        <a href="{{ route('shop') }}">Tüm Oyunlar</a>
                    </div>
                </div>
            </div>
            <div class="footer-middle">
                <div class="container">
                    <div class="footer-left">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('epin-assets/images/logo-white.png') }}" class="logo-footer" alt="E-Pin Store Logo">
                        </a>
                        <div class="social-icons">
                            @foreach($socials as $social)
                                <a href="{{ $social->link }}" class="social-icon" target="_blank" title="{{ $social->name }}">
                                    <i class="fab fa-{{ strtolower($social->name) }}"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <img src="{{ asset('epin-assets/images/payments_long.png') }}" alt="Ödeme Yöntemleri" width="180" height="28">
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container justify-content-center">
                    <p>© Copyright {{ date('Y') }}. Tüm Hakları Saklıdır.</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('epin-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('epin-assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('epin-assets/js/plugins.js') }}"></script>
    <script src="{{ asset('epin-assets/js/optional/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('epin-assets/js/optional/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('epin-assets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('epin-assets/js/main.min.js') }}"></script>


</body>
</html>