@extends('web.layout.main')

@section('content')
    <main class="main">
        <div class="container">
            <section>
                <div class="home-banner2 mt-2 mb-0 d-flex flex-md-row">
                    <div class="col-lg-4 banner-background"
                        style="background-image: url('{{ asset('epin-assets/images/demoes/demo31/banners/home_banner5.jpg') }}');">
                    </div>
                    <div class="content-center">
                        <h3 class="mb-md-0 font1">Tüm Oyunlar</h3>
                        <p class="font1">En iyi fiyatlarla e-pin dünyasını keşfet.</p>
                    </div>
                    <div class="d-flex align-items-center content-right pt-0 py-lg-5">
                        <a href="#" class="btn">Şimdi İncele</a>
                    </div>
                </div>
            </section>

            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Anasayfa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mağaza</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-9 main-content">
                    <nav class="toolbox ">
                        <div class="toolbox-left">
                            <div class="toolbox-item toolbox-sort">
                                <label>Sırala:</label>
                                <div class="select-custom">
                                    <select name="orderby" class="form-control" onchange="location = this.value;">
                                        <option value="{{ request()->fullUrlWithQuery(['orderby' => 'date']) }}"
                                            {{ request('orderby') == 'date' ? 'selected' : '' }}>Yeniye Göre</option>
                                        <option value="{{ request()->fullUrlWithQuery(['orderby' => 'price']) }}"
                                            {{ request('orderby') == 'price' ? 'selected' : '' }}>Fiyat: Düşükten Yükseğe
                                        </option>
                                        <option value="{{ request()->fullUrlWithQuery(['orderby' => 'price-desc']) }}"
                                            {{ request('orderby') == 'price-desc' ? 'selected' : '' }}>Fiyat: Yüksekten
                                            Düşüğe</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </nav>

                    @if (request()->anyFilled(['platform', 'category', 'min_price', 'max_price']))
                        <div class="alert alert-info d-flex align-items-center flex-wrap" style="border-radius: 8px;">
                            <strong class="mr-2">Aktif Filtreler: </strong>
                            @if (request('platform'))
                                <span class="badge badge-dark mr-2">{{ request('platform') }} <a
                                        href="{{ request()->fullUrlWithQuery(['platform' => null]) }}"
                                        class="text-white ml-1">×</a></span>
                            @endif
                            @if (request('category'))
                                <span class="badge badge-dark mr-2">{{ request('category') }} <a
                                        href="{{ request()->fullUrlWithQuery(['category' => null]) }}"
                                        class="text-white ml-1">×</a></span>
                            @endif
                            @if (request('min_price') || request('max_price'))
                                <span class="badge badge-dark mr-2">{{ request('min_price', 0) }} -
                                    {{ request('max_price', '∞') }} TL <a
                                        href="{{ request()->fullUrlWithQuery(['min_price' => null, 'max_price' => null]) }}"
                                        class="text-white ml-1">×</a></span>
                            @endif
                            <a href="{{ route('shop') }}" class="ml-auto text-info font-weight-bold">Filtreleri
                                Temizle</a>
                        </div>
                    @endif

                    <div class="row products-group">
                        @forelse($games as $game)
                            <div class="col-6 col-sm-4 col-md-3 mb-4">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure style="height: 300px; overflow: hidden; background: #222;">
                                        <a
                                            href="{{ route('product.detail', ['platform' => $game->platform->slug, 'game' => $game->game->slug]) }}">
                                            <img src="{{ asset('storage/games/' . $game->game->image) }}"
                                                alt="{{ $game->game->name }}"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="javascript:void(0);" class="btn-icon btn-add-wishlist add-to-wishlist"
                                                data-game-id="{{ $game->game_id }}"
                                                data-platform-id="{{ $game->platform_id }}">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                        <a href="{{ route('product.detail', ['platform' => $game->platform->slug, 'game' => $game->game->slug]) }}"
                                            class="btn-quickview" title="Quick View">{{ $game->platform->name }}</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">

                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a
                                                href="{{ route('product.detail', ['platform' => $game->platform->slug, 'game' => $game->game->slug]) }}">{{ $game->game->name }}</a>
                                        </h3>
                                        <div class="price-box">
                                            <span class="product-price">{{ number_format($game->current_price, 2) }}
                                                TL</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <h4>Aradığınız kriterlere uygun oyun bulunamadı.</h4>
                            </div>
                        @endforelse
                    </div>

                    <nav class="toolbox toolbox-pagination">
                        {{ $games->appends(request()->input())->links('pagination::bootstrap-4') }}
                    </nav>
                </div>

                <div class="sidebar-overlay"></div>
                <aside class="sidebar-shop col-lg-3 pb-4 order-lg-first mobile-sidebar">
                    <div class="sidebar-wrapper">
                        <div class="widget">
                            <h3 class="widget-title"><a data-toggle="collapse" href="#widget-body-2">Kategoriler</a></h3>
                            <div class="collapse" id="widget-body-2">
                                <div class="widget-body">
                                    <ul class="cat-list">
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{ request()->fullUrlWithQuery(['category' => $category->slug]) }}"
                                                    class="{{ request('category') == $category->slug ? 'text-primary font-weight-bold' : '' }}">
                                                    {{ $category->name }} <span
                                                        class="products-count">({{ $category->games_count }})</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="widget">
                            <h3 class="widget-title"><a data-toggle="collapse" href="#widget-body-platform">Platformlar</a>
                            </h3>
                            <div class="collapse" id="widget-body-platform">
                                <div class="widget-body">
                                    <ul class="cat-list">
                                        @foreach ($platforms as $platform)
                                            <li>
                                                <a href="{{ request()->fullUrlWithQuery(['platform' => $platform->slug]) }}"
                                                    class="{{ request('platform') == $platform->slug ? 'text-primary font-weight-bold' : '' }}">
                                                    {{ $platform->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="widget">
                            <h3 class="widget-title"><a data-toggle="collapse" href="#widget-body-3">Fiyat Aralığı</a></h3>
                            <div class="collapse show" id="widget-body-3">
                                <div class="widget-body">
                                    <form action="{{ route('shop') }}" method="GET">
                                        @if (request('platform'))
                                            <input type="hidden" name="platform" value="{{ request('platform') }}">
                                        @endif
                                        @if (request('category'))
                                            <input type="hidden" name="category" value="{{ request('category') }}">
                                        @endif
                                        <div class="row p-2">
                                            <div class="col-6 p-1">
                                                <input type="number" name="min_price" class="form-control"
                                                    placeholder="Min" value="{{ request('min_price') }}">
                                            </div>
                                            <div class="col-6 p-1">
                                                <input type="number" name="max_price" class="form-control"
                                                    placeholder="Max" value="{{ request('max_price') }}">
                                            </div>
                                            <div class="col-12 p-1">
                                                <button type="submit"
                                                    class="btn btn-primary btn-block btn-sm">Filtrele</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        <div class="mb-2"></div>
    </main>
@endsection
