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
                                <a class="nav-link active bg-primary text-white mb-2" style="border-radius: 8px;"
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
                        <h2 class="mb-4 text-dark font-weight-bold mb-4">Favorilerim</h2>

                        @if ($wishlistItems->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="border-0">Oyun</th>
                                            <th class="border-0">Platform</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishlistItems as $item)
                                            <tr>
                                                <td class="align-middle border-top-0">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('storage/games/' . $item->game->image) }}"
                                                            style="width: 45px; border-radius: 6px;"
                                                            class="order-product-img mr-3">
                                                        <a href="{{ route('product.detail', [$item->platform->slug, $item->game->slug]) }}"
                                                            class="text-decoration-none">

                                                            <span
                                                                class="text-dark font-weight-600">{{ $item->game->name }}</span>
                                                        </a>
                                                    </div>
                                                </td>

                                                <td class="align-middle border-top-0">
                                                    <span class="badge badge-light p-3"
                                                        style="color: #0088cc; background: #eef7fd; font-size: 14px;">
                                                        {{ $item->platform->name }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-gamepad fa-3x text-light-gray mb-3"></i>
                                <p class="text-muted">Henüz bir oyunu favorilere eklemediniz.</p>
                                <a href="{{ route('shop') }}" class="btn btn-primary mt-2">Oyunlara Göz At</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.remove-from-wishlist').on('click', function(e) {
                e.preventDefault();

                let btn = $(this);
                let gameId = btn.data('game-id');
                let platformId = btn.data('platform-id');
                let productCard = btn.closest('.col-6');

                if (confirm('Bu ürünü favorilerinizden kaldırmak istediğinize emin misiniz?')) {
                    $.ajax({
                        url: "{{ route('wishlist.toggle') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            game_id: gameId,
                            platform_id: platformId
                        },
                        success: function(response) {
                            if (response.status === 'removed') {
                                productCard.fadeOut(300, function() {
                                    $(this).remove();

                                    if ($('.product-default').length === 0) {
                                        $('.row').html(
                                            '<p>Favori listeniz şu anda boş.</p>');
                                    }
                                });
                            }
                        },
                        error: function(xhr) {
                            alert('Bir hata oluştu. Lütfen tekrar deneyin.');
                        }
                    });
                }
            });
        });
    </script>
    <style>
        .order-product-img {
            width: 60px !important;
            height: 80px !important;
            object-fit: cover;
        }
    </style>
@endsection
