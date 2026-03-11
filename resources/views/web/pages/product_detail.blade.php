@extends('web.layout.main')

@section('content')
    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('shop') }}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $game->name }}</li>
                </ol>
            </nav>

            <div class="product-single-container product-single-default">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="product-single-gallery">
                            <img class="product-single-image" src="{{ asset('storage/games/' . $game->image) }}"
                                style="width: 100%; height: 600px; object-fit: cover; border-radius: 8px;"
                                alt="{{ $game->name }}" />
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6 product-single-details">
                        <h1 class="product-title">{{ $game->name }}</h1>

                        <div class="product-platform-container">
                            <div class="product-platform-ratings">
                                <span class="product-platform-name">
                                    <h4> <img src="{{ asset('storage/platforms/' . $platformData->icon) }}"
                                            alt="Platform Icon" style="width: 35px; height: 35px; object-fit: cover;">
                                        {{ $platformData->name ?? 'N/A' }} </h4>
                                </span>
                            </div>
                        </div>


                        <hr class="short-divider">

                        <div class="price-box">
                            <span class="product-price" style="font-size: 2.5rem; color: #0088cc;">
                                {{ number_format($price, 2) }} TL
                            </span>
                        </div>

                        <div class="product-desc">
                            <p>
                                {!! Str::limit(strip_tags($game->description), 200, '...') !!}
                                <a href="#product-tab-desc" class="text-primary scroll-to"> Devamını Oku</a>
                            </p>
                        </div>

                        <div class="product-info-box">
                            <div class="product-info-date">
                                <span class="product-info-name">Release date:</span>
                                <span class="product-info">{{ $game->release_date }}</span>
                            </div>
                            <div class="product-info-developer">
                                <span class="product-info-name">Developer:</span>
                                <span class="product-info">{{ $game->developer ?? 'N/A' }}</span>
                            </div>
                            <div class="product-info-publisher">
                                <span class="product-info-name">Publisher:</span>
                                <span class="product-info">{{ $game->publisher ?? 'N/A' }}</span>
                            </div>
                            <div class="product-info-gamemode">
                                <span class="product-info-name">Game Mode:</span>
                                @foreach ($game->gameModes as $mode)
                                    <span class="product-info">{{ $mode->name }}{{ !$loop->last ? ',' : '' }}</span>
                                @endforeach
                            </div>

                            <div class="product-info-rate d-flex align-items-center mt-3">
                                <span class="product-info-name mr-3">Rated:</span>
                                @if ($game->rated)
                                    <img src="{{ asset('storage/rateds/' . $game->rated->image) }}"
                                        alt="{{ $game->rated->name }}"
                                        style="width: 45px; height: 45px; margin-right: 12px;">
                                    <span class="product-info"><strong>{{ $game->rated->name }}</strong> -
                                        {{ $game->rated->description }}</span>
                                @endif
                            </div>
                        </div>

                        <ul class="single-info-list mt-3">
                            <li>
                                CATEGORIES:
                                <strong>
                                    @foreach ($game->categories as $cat)
                                        <a href="{{ route('shop', ['category' => $cat->slug]) }}"
                                            class="product-category">{{ strtoupper($cat->name) }}</a>{{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </strong>
                            </li>
                        </ul>

                        <div class="product-action mt-4">
                            @if (auth()->check())
                                <a href="{{ route('checkout', [$game->id, $platformData->id]) }}"
                                    class="btn btn-primary">SATIN AL</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">SATIN AL</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-single-tabs mt-5">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content"
                            role="tab">Oyun Hakkında</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel">
                        <div class="product-desc-content">
                            {!! nl2br(e($game->description)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
