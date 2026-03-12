@extends($masterpage ?? 'panel.master')

@section('breadcrumb')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Ana Sayfa</a></li>
    @foreach($container->view->breadcrumb as $title => $href)
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
                <h2>{{ $container->title }} </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
 
                    <table datatable class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th class="text-center wd-50">#</th>
                                <th class="text-center ">Hakkımızda Başlığı</th>
                                <th class="text-center">Hakkımızda Açıklaması</th> 
                                <th class="text-center wd-50">Logo</th>
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
                    data: 'title', 
                    name: 'title', 
                    className: 'text-center',
                    defaultContent: '<span class="badge badge-secondary">Belirtilmemiş</span>'
                }, 
                { 
                    data: 'description', 
                    name: 'description', 
                    className: 'text-center',
                    defaultContent: '<span class="badge badge-secondary">Belirtilmemiş</span>'
                }, 
               { 
                    data: 'logo', 
                    name: 'logo', 
                    className: 'text-center',
                    render: function(data) {
                        return data ? '<img src="/storage/about/' + data + '" class="img-thumbnail" style="width:50px; height:50px; object-fit:cover;">' : '<i class="fal fa-gamepad fa-2x"></i>';
                    }
                },
                {
                    render : function (data, type, row)
                    {
                        var html = ''; 
                        html += '<a href="{{ route('panel.' . $container->page . '_form') }}/' + row.id + '" class="btn btn-info btn-sm btn-icon waves-effect waves-themed mr-1" title="Düzenle">';
                        html += '   <i class="fal fa-edit"></i>';
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
                   filename: 'Hakkımızda_Listesi',
                   title: 'Hakkımızda Listesi'
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