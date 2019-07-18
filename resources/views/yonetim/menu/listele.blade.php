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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Menüler</span> - Listele</h4>
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
                <li><a href=""><i class="icon-home2 position-left"></i> Anasayfa</a></li>
                <li><a href="">Menüler</a></li>
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
            <h5 class="panel-title">Ana Menüler</h5>
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
                <th>Menü Adı</th>
                <th>Linki</th>
                <th>Alt Menüleri</th>
                <th>Ek. Tarihi</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $menuler as $i => $menu )
            <tr id="tr-{{ $menu->id }}">
                <td>{{ $i }}</td>
                <td>{{ $menu->menu_adi }}</td>
                <td><a class="ana_menu" href="#alt_table_wrapper">{{ $menu->sef_link }}</a></td>
                <td>{{ count($menu->child) }} 'adet alt <a class="getir_alt_menu" data-id="{{ $menu->id }}" data-toggle="modal" data-target="#modal_alt_menu" href="#">menü</a></td>
                <td>{{ date('m-d-Y', strtotime($menu->olusturma_tarihi)) }}</td>
                <td>
                    <ul class="list list-inline no-margin">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle text-default" data-toggle="dropdown">
                                <i class="icon-cog7 position-left"></i>
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">G / S</li>
                                <li><a href=""><i class="icon-plus3"></i>Alt Menü Ekle</a></li>
                                <li><a href="{{ route('yonetim.menu.duzenle', $menu->id) }}"><i class="icon-pencil7"></i>Güncelle</a></li>
                                <li><a class="delete" id="sil-{{ $menu->id }}" href="#"><i class="icon-bin"></i>Sil</a></li>
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

    <!-- Key table events -->
    <div id="alt_table_wrapper" class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Alt Menüler</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
        <table id="alt-table" class="table datatable-show-all">
            <thead>
            <tr>
                <th>#</th>
                <th>Menü Adı</th>
                <th>Ana Menüsü</th>
                <th>Linki</th>
                <th>İçeriği</th>
                <th>Ek. Tarihi</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach($alt_menuler as $i => $alt_menu)
                @if($alt_menu->ana_menusu != NULL)
                <tr id="tr-{{ $alt_menu->id }}" name="anatr-{{ $alt_menu->ana_menusu->id }}">
                    <td>{{ $i }}</td>
                    <td>{{ $alt_menu->menu_adi }}</td>
                    <td>{{ $alt_menu->ana_menusu->menu_adi }}</td>
                    <td><a href="#">{{ $alt_menu->ana_menusu->sef_link.'/'.$alt_menu->sef_link }}</a></td>
                    <td><a target="_blank" href="{{ count($alt_menu->menu_icerik) > 0 ? route('yonetim.icerik.guncelle', $alt_menu->alt_menu_icerik->id) : route('yonetim.icerik.ekle', 'id='.$alt_menu->id) }}">{{ count($alt_menu->menu_icerik) > 0 ? 'Eklenmiş/Düzenle' : 'Eklenmemiş/Ekle' }}</a></td>
                    <td>{{ date('m-d-Y', strtotime($alt_menu->olusturma_tarihi)) }}</td>
                    <td>
                        <ul class="list list-inline no-margin">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle text-default" data-toggle="dropdown">
                                    <i class="icon-cog7 position-left"></i>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">G / S</li>
                                    <li><a href=""><i class="icon-plus3"></i>Alt Menü Ekle</a></li>
                                    <li><a href="{{ route('yonetim.menu.duzenle', $alt_menu->id) }}"><i class="icon-pencil7"></i>Güncelle</a></li>
                                    <li><a class="delete" id="sil-{{ $alt_menu->id }}" href="#"><i class="icon-bin"></i>Sil</a></li>
                                    <li class="dropdown-header">Çıktı</li>
                                    <li><a href="#"><i class="icon-file-pdf"></i> pdf' e aktar</a></li>
                                    <li><a href="#"><i class="icon-file-excel"></i> csv' ye aktar</a></li>
                                    <li><a href="#"><i class="icon-file-word"></i> doc' a aktar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /key table events -->

    <!-- Custom modal color -->
    <div id="modal_alt_menu" class="modal fade"></div>
    <!-- /custom modal color -->

@endsection
@section('ajax')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.getir_alt_menu').on('click', function () {
            swal({
                title: 'Yükleniyor..!',
                text: 'Lütfen Bekleyiniz.',
                onOpen: () => {
                    swal.showLoading()
                }
            })
            var ID = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: '{{ route('yonetim.altmenu.getir') }}',
                data: {
                    ID: ID
                },
                success: function (data) {
                    $('#modal_alt_menu').html("").html(data);
                    swal.close();
                }
            })
        });
        $('.ana_menu').on('click', function () {
            $('#alt-table_filter').find('input').val("").val($(this).text()).trigger('keyup');
        });
        $('.delete').on('click', function (e) {
            e.preventDefault();
            var ID = $(this).attr('id');
            swal({
                title: 'Bu menüyü',
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
                url: '{{ route('yonetim.menu.sil') }}',
                data: {
                    ID: ID
                },
                dataType: 'json',
                success: function (data) {
                    if ( data.info ) {
                        swal(
                            'Silinemedi!',
                            'Bu alanı silemezsiniz sadece güncelleyebilirsiniz!.',
                            'info'
                        );
                    } else if ( data.success ) {
                        swal(
                            'Silindi!',
                            'Menü başarıyla silindi!.',
                            'success'
                        );
                        $('#tr-' + ID).remove();
                        $('tr[name=anatr-'+ID+']').remove();
                    }
                    console.log(data);
                },
                error: function (data) {
                    swal(
                        'Silinemedi!',
                        'Menü silinirken hata oluştu!.',
                        'error'
                    );
                    console.log(data);
                }
                /*success: function (data) {
                    console.log(data);
                    swal(
                        'Silindi!',
                        'Menü başarıyla silindi!.',
                        'success'
                    );
                    $('#tr-' + ID).remove();
                    $('tr[name=anatr-'+ID+']').remove();
                },
                abort: function () {
                    swal(
                        'Silinemedi!',
                        'Bu alanı silemezsiniz sadece güncelleyebilirsiniz!.',
                        'danger'
                    );
                    console.log(data);
                },
                */

            });
        }
    </script>
@endsection