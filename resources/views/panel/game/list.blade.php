@extends($masterpage ?? 'panel.master')

@section('breadcrumb')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Ana Sayfa</a></li>
    @foreach($container->view->breadcrumb as $title => $href)
    <li class="breadcrumb-item"><a href="{{ $href }}">{{ $title }}</a></li>
    @endforeach
    <li class="breadcrumb-item active">Oyun Listesi</li>

    <li class="position-absolute pos-top pos-right d-none d-sm-block">
        <a href="javascript:void(0);" excel-export class="btn btn-info btn-icon waves-effect waves-themed mr-2" style="margin-top: -8px;" title="Excel Dışa Aktar">
            <i class="fal fa-file-excel"></i>
        </a> 
        <a href="{{ route('panel.' . $container->page . '_form') }}" class="btn btn-success btn-icon waves-effect waves-themed" style="margin-top: -8px;" title="Yeni Oyun Ekle">
            <i class="fal fa-plus"></i>
        </a>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>{{ $container->title }} Listesi</h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
 
                    <table datatable class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th class="text-center wd-50">#</th>
                                <th class="text-center wd-80">Görsel</th>
                                <th class="text-center wd-100">Oyun Adı</th>
                                <th class="text-center wd-100">Geliştirici</th> 
                                <th class="text-center wd-100">Yayıncı</th> 
                                <th class="text-center wd-100">Yaş Sınırı</th>  
                                <th class="text-center wd-100">Eklenme Tarihi</th> 
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
    $(document).ready(function()
    {
        BaseCRUD.selector = "[datatable]";
        BaseCRUD.ajaxtable({
            ajax: {
                url: "{{ route('panel.' . $container->page . '_list') }}?datatable=true",
                type: 'GET'
            },  
            columns: [
                { data: 'id', name: 'id', className: 'text-center' },
                { 
                    data: 'image', 
                    name: 'image', 
                    className: 'text-center',
                    render: function(data) {
                        return data ? '<img src="/storage/games/' + data + '" class="img-thumbnail" style="width:50px; height:50px; object-fit:cover;">' : '<i class="fal fa-gamepad fa-2x"></i>';
                    }
                },
                { data: 'name', name: 'name', className: 'text-center' }, 
                { data: 'developer', name: 'developer', className: 'text-center' }, 
                { data: 'publisher', name: 'publisher', className: 'text-center' }, 
                { 
                    data: 'rated.name', 
                    name: 'rated.name', 
                    className: 'text-center',
                    defaultContent: '<span class="badge badge-secondary">Belirtilmemiş</span>'
                },   
                { data: 'created_at', name: 'created_at', className: 'text-center' }, 
                {
                    render : function (data, type, row)
                    {
                        var html = ''; 
                        html += '<a href="{{ route('panel.' . $container->page . '_form') }}/' + row.id + '" class="btn btn-info btn-sm btn-icon waves-effect waves-themed mr-1" title="Düzenle">';
                        html += '   <i class="fal fa-edit"></i>';
                        html += '</a>'; 
                        
                        html += '<a href="javascript:void(0);" row-delete="' + row.id + '" class="btn btn-danger btn-sm btn-icon waves-effect waves-themed" title="Sil">';
                        html += '   <i class="fal fa-trash"></i>';
                        html += '</a>'; 

                        return html;
                    },
                    data: null, orderable: false, searchable: false, className: 'text-center act-col',
                },
            ],  
            dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'l>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>><'disabled-none'B>",
            buttons: [
                {
                   extend: 'csv',
                   charset: 'UTF-8',
                   fieldSeparator: ';',
                   bom: true,
                   filename: 'Oyun_Listesi',
                   title: 'Oyun Listesi'
                },
                'pdfHtml5'
            ],
            order: [[0, 'DESC']],
            pageLength: 25,
        });
 
        $('[excel-export]').click(function(){
            $('.dt-buttons .buttons-csv').trigger('click');
        });

        BaseCRUD.delete("{{ route('panel.' . $container->page . '_delete') }}");
    });
</script>
@endsection