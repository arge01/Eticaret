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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Kategoriler</span> - Listele</h4>
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
                <li><a href="datatable_extension_key_table.html">Kategoriler</a></li>
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
            <h5 class="panel-title">Kategori Listesi</h5>
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
                <th>Kategori Adı</th>
                <th>Alt Kategorileri</th>
                <th>Resmi</th>
                <th>Linki</th>
                <th>Eklenme Tarihi</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $kategoriler as $i => $kategori )
            <tr id="tr-{{ $kategori->id }}">
                <td>{{ $i }}</td>
                <td>{{ $kategori->kategori_adi }}</td>
                <td><b id="adet_kategori_{{ $kategori->id }}">{{ count($kategori->children) }}</b>' adet <a data-id="{{ $kategori->id }}" class="getir_alt_kategori" data-toggle="modal" data-target="#modal_alt_kategorileri" href="#">alt kategori</a></td>
                <td><a href="#">{{ $kategori->img != NULL ? 'Eklenmiş' : 'Eklenmemiş' }}</a></td>
                <td><a class="ana_kategori" href="#alt-table_wrapper">{{ $kategori->sef_link }}</a></td>
                <td>{{ date('m-d-Y', strtotime($kategori->olusturma_tarihi)) }}</td>
                <td>
                    <ul class="list list-inline no-margin">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle text-default" data-toggle="dropdown">
                                <i class="icon-cog7 position-left"></i>
                                İşlem
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">G / S</li>
                                <li><a href="{{ route('yonetim.kategoriduzenle', $kategori->id) }}"><i class="icon-pencil7"></i>Güncelle</a></li>
                                <li><a class="delete" id="sil-{{ $kategori->id }}" href="#"><i class="icon-bin"></i>Sil</a></li>
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
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Alt Kategori Listesi</h5>
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
                <th>Kategori Adı</th>
                <th>Ana Kategorisi</th>
                <th>İçerikleri</th>
                <th>İçerik Ekle</th>
                <th>Eklenme Tarihi</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach($alt_kategoriler as $i => $alt_kategori)
            @if($alt_kategori->ana_kategori != NULL)
            <tr id="tr-{{ $alt_kategori->id }}" name="anatr-{{ $alt_kategori->ana_kategori->id }}">
                <td>{{ $i++ }}</td>
                <td>{{ $alt_kategori->kategori_adi }}</td>
                <td>{{ $alt_kategori->ana_kategori->kategori_adi }}</td>
                <td><a href="{{ route('yonetim.urun.listele', 'id='.$alt_kategori->id) }}">{{ count($alt_kategori->urunleri) }} 'adet </a>içerik eklenmiş</td>
                <td><a target="_blank" href="{{ route('yonetim.urun.ekle', 'id='.$alt_kategori->id) }}">{{ $alt_kategori->ana_kategori->sef_link.'/'.$alt_kategori->sef_link }}</a></td>
                <td>{{ date('m-d-Y', strtotime($alt_kategori->olusturma_tarihi)) }}</td>
                <td>
                    <ul class="list list-inline no-margin">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle text-default" data-toggle="dropdown">
                                <i class="icon-cog7 position-left"></i>
                                İşlem
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">G / S</li>
                                <li><a href="{{ route('yonetim.kategoriduzenle', $alt_kategori->id) }}"><i class="icon-pencil7"></i>Güncelle</a></li>
                                <li><a class="delete" id="sil-{{ $alt_kategori->id }}" href="#"><i class="icon-bin"></i>Sil</a></li>
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

    <!-- Custom background color -->
    <div id="modal_alt_kategorileri" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content bg-teal-300">
                <div class="modal-header">
                    <button id="modal-kapat" type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><b id="gelen_adi"></b> kategorisnin alt kategorileri</h5>
                </div>

                <div class="modal-body">
                    <h6><span id="gelen_adedi"></span>' Adet</h6>
                    <h5 class="extent_add">Çoklu veya Tekli Alt Kategori <span id="coklu_tekli_ekle"></span></h5>
                    <hr>
                    <!-- Key table events -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Alt Kategori Listesi</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <table id="gelen-table" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori Adı</th>
                                    <th>Link</th>
                                    <th>Ek. Tarihi</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /key table events -->
                </div>
            </div>
        </div>
    </div>
    <!-- /custom background color -->

@endsection
@section('ajax')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        @if(count($alt_kategoriler) > 0)
        $('.getir_alt_kategori').on('click', function () {
            $('#modal_alt_kategorileri:visible').hide();
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
                url: '{{ route('yonetim.altkategorigetir') }}',
                data: {
                    ID: ID
                },
                dataType: 'json',
                success: function (data) {
                    $('#gelen_adi').html("").html(data["kategori_adi"]);
                    $('#coklu_tekli_ekle').html("").html('<a href="{{ route("yonetim.kategoriduzenle", NULL) }}/'+data["id"]+'">Ekle</a>');
                    $('#gelen_adedi').html("").html(data['children'].length);
                    $('#gelen-table').find('tbody').find('tr').remove();
                    $.each( data['children'], function ( i, data ) {
                        $('#gelen-table tbody').append(
                            '<tr id="#2tr-'+data["id"]+'">' +
                            '<td>'+i+'</td>' +
                            '<td>'+data["kategori_adi"]+'</td>' +
                            '<td>'+data["sef_link"]+'</td>' +
                            '<td>'+data["olusturma_tarihi"]+'</td>' +
                            '<td>' +
                                '<ul class="list list-inline no-margin">' +
                                '<li class="dropdown">' +
                                '<a href="#" class="dropdown-toggle text-default" data-toggle="dropdown">' +
                                '<i class="icon-cog7 position-left"></i>' +
                                'İşlem' +
                                '<span class="caret"></span>' +
                                '</a>' +
                                '<ul class="dropdown-menu dropdown-menu-right">' +
                                '<li class="dropdown-header">G / S</li>' +
                                '<li><a href="{{ config('app.url') }}yonetim/kategori/duzenle/'+data['id']+'"><i class="icon-pencil7"></i>Güncelle</a></li>' +
                                '<li><a onclick="deleted('+ data["id"] +')" id="sil-{{ $kategori->id }}" href="#"><i class="icon-bin"></i>Sil</a></li>' +
                                '</ul>' +
                                '</li>' +
                                '</ul>' +
                            '</td>' +
                            '</tr>'
                        );
                    });
                    swal.close();
                    $('#modal_alt_kategorileri:hidden').show();
                    console.log(data);
                }
            })
        });
        @endif
        $('.ana_kategori').on('click', function () {
            $('#alt-table_filter').find('input').val("").val($(this).text()).trigger('keyup');
        });
        $('.delete').on('click', function (e) {
            e.preventDefault();
            var ID = $(this).attr('id');
            swal({
                title: 'Bu kategoriyi',
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
            })
        });
        function deleted(ID) {
            $.ajax({
                type: 'POST',
                url: '{{ route('yonetim.kategorisil') }}',
                data: {
                    ID: ID
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    swal(
                        'Silindi!',
                        'Kategori başarıyla silindi!.',
                        'success'
                    );
                    $('#tr-' + ID).remove();
                    $('#2tr-' + ID).remove();
                    var adet = $('#adet_kategori_'+ data['data']['ust_id']).html();
                    $('#adet_kategori_'+ data['data']['ust_id']).html(adet - 1);
                    $('tr[name=anatr-'+ID+']').remove();
                },
                error: function (data) {
                    console.log(data);
                }

            });
        }
    </script>
@endsection