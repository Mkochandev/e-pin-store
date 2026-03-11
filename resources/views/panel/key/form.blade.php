@extends($masterpage ?? 'panel.master')

@section('breadcrumb')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Ana Sayfa</a></li>
        <li class="breadcrumb-item active">Key Yönetimi</li>
        <li class="breadcrumb-item active">{{ is_null($item->id) ? 'Ekle' : 'Düzenle' }}</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Oyun {{ is_null($item->id) ? 'Ekle' : 'Düzenle' }}</h2>
                </div>
                <form ajax-form method="POST"
                    action="{{ route('panel.' . $container->page . '_save', ['unique' => $item->id]) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Platform</label>
                                        <select name="platform_id" class="form-control select2" required>
                                            <option value="">Seçiniz</option>
                                            @foreach ($platforms as $platform)
                                                <option value="{{ $platform->id }}"
                                                    {{ $item->platform_id == $platform->id ? 'selected' : '' }}>
                                                    {{ $platform->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Oyun</label>
                                        <select name="game_id" class="form-control select2" required>
                                            <option value="" name="game">Seçiniz</option>
                                            @foreach ($games as $game)
                                                <option value="{{ $game->id }}"
                                                    {{ $item->game_id == $game->id ? 'selected' : '' }}>
                                                    {{ $game->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    @if (is_null($item->id))
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Toplu Oyun Anahtarları</label>
                                            <textarea name="keys" class="form-control" rows="10"
                                                placeholder="Her satıra bir anahtar gelecek şekilde yapıştırın..."></textarea>
                                            <span class="help-block">Not: Burası doluysa aşağıdaki tekli anahtar alanı
                                                dikkate alınmaz.</span>
                                        </div>
                                    @endif

                                    <div class="form-group mb-3">
                                        <label class="form-label">Tekli Oyun Anahtarı</label>
                                        <input type="text" class="form-control" name="key_code"
                                            value="{{ old('key_code', $item->key_code) }}"
                                            {{ is_null($item->id) ? '' : 'required' }}>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Oyun Fiyatı</label>
                                        <input type="number" class="form-control" name="price"
                                            value="{{ old('price', $item->price) }}" step="0.01">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex">
                            <button class="btn btn-primary ml-auto waves-effect waves-themed wd-100"
                                type="submit">Kaydet</button>
                            <a class="btn btn-warning ml-2 waves-effect waves-themed wd-100 color-white"
                                href="{{ route('panel.' . $container->page . '_list') }}">İptal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
