@extends($masterpage ?? 'panel.master')

@section('breadcrumb')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Ana Sayfa</a></li>
    @foreach($container->view->breadcrumb as $title => $href)
    <li class="breadcrumb-item"><a href="{{ $href }}">{{ $title }}</a></li>
    @endforeach
    <li class="breadcrumb-item active">Oyun Anahtarı Listesi</li>

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
                                <th class="text-center wd-100">Oyun Adı</th>
                                <th class="text-center wd-100">Platform</th> 
                                <th class="text-center wd-100">Fiyat</th>  
                                <th class="text-center">Oyun Anahtarı</th> 
                                <th class="text-center wd-100">Durum</th> 
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
                    data: 'game.name', 
                    name: 'game.name', 
                    className: 'text-center',
                    defaultContent: '<span class="badge badge-secondary">Belirtilmemiş</span>'
                }, 
                { 
                    data: 'platform.name', 
                    name: 'platform.name', 
                    className: 'text-center',
                    defaultContent: '<span class="badge badge-secondary">Belirtilmemiş</span>'
                }, 
                { data: 'price', name: 'price', className: 'text-center' },   
                { data: 'key_code', name: 'key_code', className: 'text-center' }, 
                {
                    data: 'is_sold', 
                    name: 'is_sold', 
                    className: 'text-center act-col',
                    render : function (data, type, row) {
                        return (data == 1) ? '<span class="badge badge-success">Satıldı</span>' : '<span class="badge badge-danger">Satılmadı</span>';
                    }
                },
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
                   filename: 'Oyun_Anahtarı_Listesi',
                   title: 'Oyun Anahtarı Listesi'
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