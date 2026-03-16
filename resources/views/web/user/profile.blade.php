@extends('web.layout.main')

@section('content')
    <main class="main bg-light"
        style="background-color: #f4f7f6 !important; min-height: 80vh; padding-top: 40px; padding-bottom: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 12px; background: #fff;">
                        <h4 class="text-dark font-weight-bold mb-4">Hesabım</h4>
                        <ul class="nav flex-column nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active bg-primary text-white mb-2" style="border-radius: 8px;"
                                    href="#">
                                    <i class="fas fa-user-cog mr-2"></i> Profil Bilgileri
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark mb-2" style="border-radius: 8px;"
                                    href="{{ route('profile.orders') }}">
                                    <i class="fas fa-shopping-bag mr-2"></i> Siparişlerim
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark mb-2" style="border-radius: 8px;"
                                    href="{{ route('profile.wishlist') }}">
                                    <i class="fas fa-heart mr-2"></i> Favorilerim
                                </a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link text-dark mb-2" style="border-radius: 8px;"
                                    href="{{ route('profile.settings') }}">
                                    <i class="fas fa-cog mr-2"></i> Şifre Değiştir
                                </a>
                            </li>

                            <li class="nav-item mt-4">
                                <a class="nav-link text-danger border-0 bg-transparent w-100 text-left"
                                    href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Çıkış Yap
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="card border-0 shadow-sm p-4" style="border-radius: 15px; background: #fff;">
                        <h3 class="text-dark font-weight-bold mb-4">Profil Bilgilerim</h3>
                        <p><strong>Ad Soyad:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Kayıt Tarihi:</strong> {{ $user->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
