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
                    <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                        <div class="toolbox-left">
                            <a href="#" class="sidebar-toggle">
                                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                    <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                    <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                    <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                    <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                    <path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                </svg>
                                <span>Filtrele</span>
                            </a>
                            <div class="toolbox-item toolbox-sort">
                                <label>Sırala:</label>
                                <div class="select-custom">
                                    <select name="orderby" class="form-control">
                                        <option value="date" selected="selected">Yeniye Göre</option>
                                        <option value="price">Fiyat: Düşükten Yükseğe</option>
                                        <option value="price-desc">Fiyat: Yüksekten Düşüğe</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </nav>

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
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-2" role="button"
                                    aria-expanded="true">Kategoriler</a>
                            </h3>
                            <div class="collapse show" id="widget-body-2">
                                <div class="widget-body">
                                    <ul class="cat-list">
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{ route('shop', ['category' => $category->slug]) }}">
                                                    {{ $category->name }}<span
                                                        class="products-count">({{ $category->games_count }})</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="widget widget-price">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-3" role="button"
                                    aria-expanded="true">Fiyat Aralığı</a>
                            </h3>
                            <div class="collapse show" id="widget-body-3">
                                <div class="widget-body">
                                    <form action="{{ route('shop') }}" method="GET">
                                        <div class="price-slider-wrapper">
                                            <div id="price-slider"></div>
                                        </div>
                                        <div
                                            class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                            <div class="filter-price-text">
                                                Fiyat: <span id="filter-price-range"></span>
                                            </div>
                                            <button type="submit" class="btn btn-primary font2">Filtrele</button>
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
