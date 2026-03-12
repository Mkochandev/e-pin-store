@extends($masterpage ?? 'panel.master')

@section('breadcrumb')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Ana Sayfa</a></li>
        @foreach ($container->view->breadcrumb as $title => $href)
            <li class="breadcrumb-item"><a href="{{ $href }}">{{ $title }}</a></li>
        @endforeach
        <li class="breadcrumb-item active">{{ $container->title }}</li>

    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>{{ $container->title }}</h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">

                        <table datatable class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="text-center wd-50">#</th>
                                    <th class="text-center ">Ad</th>
                                    <th class="text-center">Eposta</th>
                                    <th class="text-center">Konu</th>
                                    <th class="text-center">Mesaj</th>
                                    <th class="text-center">Durum</th>
                                    <th class="text-center">Oluşturulma Tarihi</th>
                                    <th class="text-center wd-80">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_script')
    <script>
        $(document).ready(function() {
            BaseCRUD.selector = "[datatable]";
            BaseCRUD.ajaxtable({
                ajax: {
                    url: "{{ route('panel.' . $container->page . '_list') }}?datatable=true",
                    type: 'GET'
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        className: 'text-center'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center',
                        defaultContent: '<span class="badge badge-secondary">Belirtilmemiş</span>'
                    },
                    {
                        data: 'email',
                        name: 'email',
                        className: 'text-center',
                        defaultContent: '<span class="badge badge-secondary">Belirtilmemiş</span>'
                    },
                    {
                        data: 'subject',
                        name: 'subject',
                        className: 'text-center',
                        defaultContent: '<span class="badge badge-secondary">Belirtilmemiş</span>'
                    },
                    {
                        data: 'message',
                        name: 'message',
                        className: 'text-center',
                        defaultContent: '<span class="badge badge-secondary">Belirtilmemiş</span>'
                    },
                    {
                        data: 'is_read',
                        name: 'is_read',
                        className: 'text-center',
                        render: function(data) {
                            return data == 1 ?
                                '<span class="badge badge-success">Okundu</span>' :
                                '<span class="badge badge-warning">Okunmadı</span>';
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: 'text-center'
                    },
                    {
                        render: function(data, type, row) {
                            var html = '';
                            html += '<a href="{{ route('panel.' . $container->page . '_form') }}/' +
                                row.id +
                                '" class="btn btn-info btn-sm btn-icon waves-effect waves-themed mr-1" title="Düzenle">';
                            html += '   <i class="fal fa-eye"></i>';
                            html += '</a>';
                            return html;
                        },
                        data: null,
                        orderable: false,
                        searchable: false,
                        className: 'text-center act-col',
                    },
                ],
                dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'l>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>><'disabled-none'B>",
                buttons: [{
                        extend: 'csv',
                        charset: 'UTF-8',
                        fieldSeparator: ';',
                        bom: true,
                        filename: 'Oyun_Anahtarı_Listesi',
                        title: 'Oyun Anahtarı Listesi'
                    },
                    'pdfHtml5'
                ],
                order: [
                    [0, 'DESC']
                ],
                pageLength: 25,
            });

            $('[excel-export]').click(function() {
                $('.dt-buttons .buttons-csv').trigger('click');
            });

            BaseCRUD.delete("{{ route('panel.' . $container->page . '_delete') }}");
        });
    </script>
@endsection
