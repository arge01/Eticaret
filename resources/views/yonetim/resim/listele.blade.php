@extends('yonetim.layouts.master')
@section('title', config('app.name'))
@section('javascript')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/notifications/bootbox.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/notifications/sweet_alert2.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/app.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/pages/datatables_advanced.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/pages/components_modals.js"></script>
    <!-- /theme JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/pages/form_select2.js"></script>
    <!-- /theme JS files -->
@endsection
@section('pagehead')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Resimler</span> - Listele</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span></span></a>
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span></span></a>
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span></span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-home2 position-left"></i> Anasayfa</a></li>
                <li><a href="datatable_extension_key_table.html">Resimler</a></li>
                <li class="active">Listele</li>
            </ul>

            <ul class="breadcrumb-elements">
                <li><a href="#"><i class="icon-comment-discussion position-left"></i> Yardım</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-gear position-left"></i>
                        Ayarlar
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                        <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                        <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /page header -->
@endsection
@section('content')
    <!-- Key table events -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Resim Listesi</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
        <table id="ana-table" class="table datatable-show-all">
            <thead>
            <tr>
                <th>#</th>
                <th style="width: 5%">Resmi</th>
                <th>Bağlı Olduğu</th>
                <th>Eklenme Tarihi</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $resimler as $i => $resim )
                <tr id="tr-{{ $resim->id }}">
                    <td>{{ $i }}</td>
                    <td><img style="width: 100%" src="{{ config('app.url').'img/'.$resim->urun_img }}" alt=""></td>
                    <td><a href="{{ route('yonetim.urun.listele') }}">{{ $resim->urun_id == 'yeni' ? 'Tesisimiz' : $resim->urunu->urun_adi }}</a></td>
                    <td>{{ date('m-d-Y', strtotime($resim->olusturma_tarihi)) }}</td>
                    <td>
                        <ul class="list list-inline no-margin">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle text-default" data-toggle="dropdown">
                                    <i class="icon-cog7 position-left"></i>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">G / S</li>
                                    <li><a href="{{ route('yonetim.resim.duzenle', $resim->id) }}"><i class="icon-pencil7"></i>Güncelle</a></li>
                                    <li><a class="delete" id="sil-{{ $resim->id }}" href="#"><i class="icon-bin"></i>Sil</a></li>
                                    <li class="dropdown-header">Çıktı</li>
                                    <li><a href="#"><i class="icon-file-pdf"></i> pdf' e aktar</a></li>
                                    <li><a href="#"><i class="icon-file-excel"></i> csv' ye aktar</a></li>
                                    <li><a href="#"><i class="icon-file-word"></i> doc' a aktar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /key table events -->
@endsection
@section('ajax')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete').on('click', function (e) {
            e.preventDefault();
            var ID = $(this).attr('id');
            swal({
                title: 'Bu resmi',
                text: "Silmek istediğinizden eminmisiniz?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'Hayır'
            }).then((result) => {
                if (result.value) {
                    deleted(ID.split('-')[1]);
                }
            });
        });
        function deleted(ID) {
            $.ajax({
                type: 'POST',
                url: '{{ route('yonetim.resim.sil') }}',
                data: {
                    ID: ID
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    swal(
                        'Silindi!',
                        'Resim başarıyla silindi!.',
                        'success'
                    );
                    $('#tr-' + ID).remove();
                },
                error: function (data) {
                    console.log(data);
                }

            });
        }
    </script>
@endsection