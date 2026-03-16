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
                                <a class="nav-link text-dark mb-2" style="border-radius: 8px;"
                                    href="{{ route('profile') }}">
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
                                <a class="nav-link active bg-primary text-white mb-2" style="border-radius: 8px;"
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
                        <h2 class="mb-4 text-dark font-weight-bold">Şifre Değiştir</h2>
                        @if (session('success'))
                            <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 10px;">
                                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger border-0 shadow-sm mb-4" style="border-radius: 10px;">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li><i class="fas fa-exclamation-circle mr-2"></i> {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('profile.settings.update') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="current_password" class="font-weight-bold text-dark">Mevcut Şifre</label>
                                <div class="input-group">
                                    <input type="password" class="form-control bg-white " id="current_password"
                                        name="current_password" required>
                                    <div class="input-group-append">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="new_password" class="font-weight-bold text-dark">Yeni Şifre</label>
                                <div class="input-group">
                                    <input type="password" class="form-control bg-white" id="new_password"
                                        name="new_password" required>
                                    <div class="input-group-append">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="new_password_confirmation" class="font-weight-bold text-dark">Yeni Şifre
                                    (Tekrar)</label>
                                <div class="input-group">
                                    <input type="password" class="form-control bg-white" id="new_password_confirmation"
                                        name="new_password_confirmation" required>
                                    <div class="input-group-append">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">
                                <i class="fas fa-save mr-2"></i> ŞİFREYİ GÜNCELLE
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
