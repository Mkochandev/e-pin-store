@extends('web.layout.main')

@section('content')
    <main class="main about-page" style="color: #ffffff;">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Anasayfa</a></li>
                    <li class="breadcrumb-item active">Hakkımızda</li>
                </ol>
            </div>
        </nav>
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 pr-lg-5 mb-3">
                    <h2 class="title" style="color: #fff; font-weight: 700;">{{ $about->title }}</h2>
                    <p style="font-size: 1.6rem; line-height: 1.6; color: #ccc;">{{ $about->description }}</p>
                </div>
                <div class="col-lg-6">
                    <div class="about-image p-5 text-center"
                        style="background: #1a1a1a; border-radius: 15px; border: 1px solid #333;">
                        <img src="{{ asset('upload/about/' . $about->logo) }}" style="max-width: 200px;">
                    </div>
                </div>
            </div>

            <div class="features-section bg-white p-5 mb-5 shadow-lg" style="border-radius: 12px;">
                <div class="row text-center">
                    <div class="col-md-4">
                        <i class="icon-shipping-truck font-size-xl text-primary" style="font-size: 40px;"></i>
                        <h4 class="mt-2" style="color: #222; font-weight: 600;">Anında Teslimat</h4>
                        <p style="color: #666;">Satın aldığınız keyler beklemeden mailinize gelir.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="icon-credit-card font-size-xl text-primary" style="font-size: 40px;"></i>
                        <h4 class="mt-2" style="color: #222; font-weight: 600;">Güvenli Ödeme</h4>
                        <p style="color: #666;">256-bit SSL korumalı altyapı ile güvenle ödeyin.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="icon-support font-size-xl text-primary" style="font-size: 40px;"></i>
                        <h4 class="mt-2" style="color: #222; font-weight: 600;">7/24 Destek</h4>
                        <p style="color: #666;">Her türlü sorunuzda teknik ekibimiz yanınızda.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
