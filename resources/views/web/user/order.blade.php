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
                                <a class="nav-link active bg-primary text-white mb-2" style="border-radius: 8px;"
                                    href="#">
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
                        <h3 class="text-dark font-weight-bold mb-4">Satın Aldığım Oyunlar</h3>

                        @if ($myKeys->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="border-0">Oyun</th>
                                            <th class="border-0">Platform</th>
                                            <th class="border-0">E-Pin Kodu</th>
                                            <th class="border-0 text-right">Tarih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($myKeys as $order)
                                            <tr>
                                                <td class="align-middle border-top-0">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('storage/games/' . $order->game->image) }}"
                                                            style="width: 45px; border-radius: 6px;"
                                                            class="order-product-img mr-3">
                                                        <span
                                                            class="text-dark font-weight-600">{{ $order->game->name }}</span>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-top-0">
                                                    <span class="badge badge-light p-2"
                                                        style="color: #0088cc; background: #eef7fd;">
                                                        {{ $order->platform->name }}
                                                    </span>
                                                </td>
                                                <td class="align-middle border-top-0">
                                                    <div class="input-group" style="max-width: 200px;">
                                                        <input type="text"
                                                            class="form-control form-control-sm bg-light font-weight-bold text-primary border-0"
                                                            value="{{ $order->key_code }}" readonly
                                                            id="key-{{ $order->id }}">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-primary btn-sm"
                                                                onclick="copyKey('key-{{ $order->id }}')"
                                                                title="Kopyala">
                                                                <i class="far fa-copy"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-top-0 text-right text-muted small">
                                                    {{ $order->updated_at->format('d.m.Y H:i') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-gamepad fa-3x text-light-gray mb-3"></i>
                                <p class="text-muted">Henüz bir satın alımınız bulunmuyor.</p>
                                <a href="{{ route('shop') }}" class="btn btn-primary mt-2">Oyunlara Göz At</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function copyKey(elementId) {
            var copyText = document.getElementById(elementId);
            copyText.select();
            document.execCommand("copy");
            alert("Kod kopyalandı: " + copyText.value);
        }
    </script>
    <style>
        .order-product-img {
            width: 60px !important;
            height: 80px !important;
            object-fit: cover;
        }
    </style>
@endsection
