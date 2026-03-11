@extends('web.layout.main')

@section('content')
    <main class="main bg-light" style="background-color: #f4f7f6 !important; min-height: 80vh; padding-top: 40px;">
        <div class="container checkout-container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm p-5 mb-4" style="border-radius: 15px; background: #fff;">
                        <h2 class="step-title mb-4"
                            style="color: #222; font-weight: 700; border-bottom: 2px solid #0088cc; padding-bottom: 10px; display: inline-block;">
                            Ödeme Bilgileri
                        </h2>

                        <form action="{{ route('order.place') }}" method="POST" id="checkout-form">
                            @csrf
                            <input type="hidden" name="game_id" value="{{ $game->id }}">
                            <input type="hidden" name="platform_id" value="{{ $platform->id }}">

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="font-weight-bold text-dark">Ad Soyad *</label>
                                    <input type="text" name="full_name" class="form-control border-light-gray"
                                        style="background: #f9f9f9; height: 50px; border-radius: 8px;"
                                        value="{{ auth()->user()->name ?? '' }}" required />
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="font-weight-bold text-dark">E-posta Adresi *</label>
                                    <input type="email" name="email" class="form-control border-light-gray"
                                        style="background: #f9f9f9; height: 50px; border-radius: 8px;"
                                        value="{{ auth()->user()->email ?? '' }}" required />
                                </div>
                            </div>

                            <div class="payment-methods p-4"
                                style="background: #fcfcfc; border: 1px dashed #ddd; border-radius: 10px;">
                                <h4 class="text-dark mb-3"><i class="fas fa-university mr-2 text-primary"></i> Ödeme Yöntemi
                                </h4>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="bank-transfer" name="payment_method"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label font-weight-bold" for="bank-transfer"
                                        style="color: #444;">Banka Havalesi / EFT</label>
                                </div>
                                <p class="small text-muted mt-2 mb-0">
                                    Ödemeniz onaylandıktan sonra E-pin kodunuz <strong>"Siparişlerim"</strong> ekranına
                                    anında yansıyacaktır.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm p-4" style="border-radius: 15px; background: #fff;">
                        <h3 class="mb-4" style="color: #222; font-weight: 700;">Sipariş Özeti</h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="border-0">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/games/' . $game->image) }}"
                                                style="width: 70px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);"
                                                class="mr-3" alt="product">
                                            <div>
                                                <h5 class="mb-0 text-dark" style="font-weight: 600;">{{ $game->name }}
                                                </h5>
                                                <span class="badge badge-info mt-1">{{ $platform->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right border-0 align-middle">
                                        <span class="text-dark font-weight-bold">{{ number_format($keyInfo->price, 2) }}
                                            TL</span>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="mt-3">
                                <tr style="border-top: 2px solid #eee;">
                                    <td class="pt-3">
                                        <h4 class="text-dark">Toplam</h4>
                                    </td>
                                    <td class="text-right pt-3">
                                        <h3 class="text-primary font-weight-bold" style="font-size: 24px;">
                                            {{ number_format($keyInfo->price, 2) }} TL
                                        </h3>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <button type="submit" class="btn btn-primary btn-block btn-lg mt-3"
                            style="height: 60px; font-weight: 700; font-size: 18px; border-radius: 10px; text-transform: uppercase;"
                            form="checkout-form">
                            SİPARİŞİ TAMAMLA
                        </button>
                        <p class="text-center mt-3 small text-muted">Güvenli ödeme altyapısı ile korunuyorsunuz.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
