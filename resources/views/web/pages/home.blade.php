@extends('web.layout.main')

@section('content')

    <body>
        <div class="page-wrapper">
            <main class="home main">
                <section>
                    <div class="container">
                        <div class="row grid">
                            <div class="col-md-8 grid-item height-x1">
                                <div class="home-banner">
                                    <figure>
                                        <img src="{{ asset('epin-assets/images/demoes/demo31/banners/home_banner1.jpg') }}"
                                            width="780" height="440" alt="Steam Oyunları" />
                                    </figure>
                                    <div class="banner-content content-right-bottom">
                                        <h3 class="appear-animate" data-animation-name="fadeInUpShorter"
                                            data-animation-delay="400">Steam Oyunları</h3>
                                        <a href="{{ route('shop', ['platform' => 'steam']) }}" class="btn appear-animate"
                                            data-animation-name="fadeInUpShorter" data-animation-delay="800">Göz At</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 grid-item height-x2">
                                <div class="home-banner">
                                    <figure>
                                        <img src="{{ asset('epin-assets/images/demoes/demo31/banners/home_banner2.jpg') }}"
                                            width="380" height="210" alt="PS5 Oyunları" />
                                    </figure>
                                    <div class="banner-content content-right-bottom">
                                        <h3 class="appear-animate" data-animation-name="fadeInUpShorter"
                                            data-animation-delay="1200">PS5 Oyunları</h3>
                                        <a href="{{ route('shop', ['platform' => 'playstation-store']) }}"
                                            class="btn appear-animate" data-animation-name="fadeInUpShorter"
                                            data-animation-delay="1400">Göz At</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 grid-item height-x2">
                                <div class="home-banner">
                                    <figure>
                                        <img src="{{ asset('epin-assets/images/demoes/demo31/banners/home_banner3.jpg') }}"
                                            width="380" height="210" alt="Epic Games" />
                                    </figure>
                                    <div class="banner-content content-stretch">
                                        <h3 class="appear-animate" data-animation-name="fadeInUpShorter"
                                            data-animation-delay="1700">Epic Oyunları</h3>
                                        <a href="{{ route('shop', ['platform' => 'epic-games']) }}"
                                            class="btn appear-animate" data-animation-name="fadeInUpShorter"
                                            data-animation-delay="2100">Göz At</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 grid-col-sizer"></div>
                        </div>
                    </div>
                </section>
                <div class="container">
                    <section class="product-panel">
                        <div class="section-title">
                            <h2 class="mr-5 ls-0 mb-0">Son Eklenenler</h2>
                            <a href="{{ route('shop', ['game' => 'latest']) }}">Tüm Ürünleri Gör<i
                                    class="icon-right"></i></a>
                        </div>

                        <div class="row">
                            @foreach ($latestGames as $item)
                                <div class="col-6 col-md-3 mb-4">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a
                                                href="{{ route('product.detail', ['platform' => $item->platform->slug, 'game' => $item->game->slug]) }}">
                                                <img src="{{ asset('storage/games/' . $item->game->image) }}"
                                                    alt="{{ $item->game->name }}"
                                                    style="width: 280px; height: 392px; object-fit: cover;">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="javascript:void(0);" class="btn-icon btn-add-wishlist add-to-wishlist"
                                                    data-game-id="{{ $item->game_id }}"
                                                    data-platform-id="{{ $item->platform_id }}">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="platform-wrap">
                                                <a href="{{ route('shop', ['platform' => $item->platform->slug]) }}"
                                                    class="product-category">{{ $item->platform->name }}</a>
                                            </div>
                                            <h3 class="product-title">
                                                <a
                                                    href="{{ route('product.detail', ['platform' => $item->platform->slug, 'game' => $item->game->slug]) }}">{{ $item->game->name }}</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="product-price">{{ number_format($item->current_price, 2) }}
                                                    TL</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <section>
                        <div class="home-banner2 mt-4 mb-2 d-flex flex-md-row appear-animate" data-animation-name="fadeIn"
                            data-animation-delay="100">
                            <div class="col-lg-4 banner-background"
                                style="background-image: url('{{ asset('epin-assets/images/demoes/demo31/banners/home_banner5.jpg') }}')">
                            </div>
                            <div class="content-center">
                                <h3 class="mb-md-0 font1">Nintendo Oyunları</h3>
                                <a class="font1">Nintendo Swıtch ve Swıtch 2 oyunları</a>
                            </div>
                             <div class="d-flex align-items-center content-right pt-0 py-lg-5">
                        <a href="{{ route('shop', ['platform' => 'nintendo']) }}" class="btn">Şimdi İncele</a>
                    </div>
                        </div>
                    </section>

                    <section class="product-panel bar-bottom appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="100">
                        <div class="section-title">
                            <h2 class="mr-5 ls-0 mb-0">Popüler Oyunlar</h2>
                            <a href="{{ route('shop') }}">Tüm Oyunları Gör<i class="icon-right"></i></a>
                        </div>

                        <div class="row">
                            @foreach ($popularGames as $item)
                                <div class="col-6 col-md-3 mb-4">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure style="height: 392px; overflow: hidden; background: #222;">
                                            <a
                                                href="{{ route('product.detail', ['platform' => $item->platform->slug, 'game' => $item->game->slug]) }}">
                                                <img src="{{ asset('storage/games/' . $item->game->image) }}"
                                                    alt="{{ $item->game->name }}"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="javascript:void(0);" class="btn-icon btn-add-wishlist add-to-wishlist"
                                                    data-game-id="{{ $item->game_id }}"
                                                    data-platform-id="{{ $item->platform_id }}">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="platform-wrap">
                                                    <a href="{{ route('shop', ['platform' => $item->platform->slug]) }}"
                                                        class="product-category">{{ $item->platform->name }}</a>
                                                </div>
                                            </div>
                                            <h3 class="product-title">
                                                <a
                                                    href="{{ route('product.detail', ['platform' => $item->platform->slug, 'game' => $item->game->slug]) }}">{{ $item->game->name }}</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="product-price">{{ number_format($item->current_price, 2) }}
                                                    TL</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </body>
@endsection