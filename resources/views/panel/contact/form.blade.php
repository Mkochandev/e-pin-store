@extends($masterpage ?? 'panel.master')

@section('breadcrumb')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Ana Sayfa</a></li>
        <li class="breadcrumb-item active">İletişim Bilgileri</li>
        <li class="breadcrumb-item active">{{ is_null($item->id) ? 'Ekle' : 'Düzenle' }}</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>İletişim Bilgileri {{ is_null($item->id) ? 'Ekle' : 'Düzenle' }}</h2>
                </div>
                <form ajax-form method="POST"
                    action="{{ route('panel.' . $container->page . '_save', ['unique' => $item->id]) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="panel-container show">
                        <div class="panel-content">

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Adres Bilgisi </label>
                                        <input type="text" class="form-control" name="address" value="{{ old('address', $item->address) }}">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Telefon Numarası</label>
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $item->phone) }}">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">E-posta Adresi</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('email', $item->email) }}">
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