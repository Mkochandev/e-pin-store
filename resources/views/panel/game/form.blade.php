@extends($masterpage ?? 'panel.master')

@section('breadcrumb')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Ana Sayfa</a></li>
        <li class="breadcrumb-item active">Oyun Yönetimi</li>
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
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Oyun Adı</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $item->name) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Yaş Sınırı (Rated)</label>
                                        <select name="rated_id" class="form-control select2" required>
                                            <option value="">Seçiniz</option>
                                            @foreach($rateds as $rated)
                                                <option value="{{ $rated->id }}" {{ $item->rated_id == $rated->id ? 'selected' : '' }}>
                                                    {{ $rated->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Geliştirici (Developer)</label>
                                        <input type="text" class="form-control" name="developer" value="{{ old('developer', $item->developer) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Yayıncı (Publisher)</label>
                                        <input type="text" class="form-control" name="publisher" value="{{ old('publisher', $item->publisher) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Açıklama</label>
                                        <textarea class="form-control" name="description" rows="4">{{ old('description', $item->description) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="form-label d-block">Kategoriler</label>
                                    <div class="frame-wrap">
                                        @foreach($categories as $category)
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" name="categories[]" class="custom-control-input" id="cat_{{ $category->id }}" value="{{ $category->id }}"
                                                    @if(isset($game) && $game->categories->contains($category->id)) checked @endif>
                                                <label class="custom-control-label" for="cat_{{ $category->id }}">{{ $category->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label d-block">Oyun Modları</label>
                                    <div class="frame-wrap">
                                        @foreach($gameModes as $mode)
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" name="game_modes[]" class="custom-control-input" id="mode_{{ $mode->id }}" value="{{ $mode->id }}"
                                                   @if(isset($game) && $game->modes->contains($mode->id)) checked @endif>
                                                <label class="custom-control-label" for="mode_{{ $mode->id }}">{{ $mode->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Oyun Kapak Resmi</label>
                                        <input type="file" class="form-control" name="image">
                                        @if($item->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/games/' . $item->image) }}" width="150" class="img-thumbnail">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Yayın Tarihi</label>
                                        <input type="date" class="form-control" name="release_date" value="{{ $item->release_date }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex">
                            <button class="btn btn-primary ml-auto waves-effect waves-themed wd-100" type="submit">Kaydet</button>
                            <a class="btn btn-warning ml-2 waves-effect waves-themed wd-100 color-white" href="{{ route('panel.' . $container->page . '_list') }}">İptal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection