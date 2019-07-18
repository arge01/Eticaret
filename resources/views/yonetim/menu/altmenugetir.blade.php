<div class="modal-dialog">
    <div class="modal-content bg-teal-300">
        <div class="modal-header">
            <button id="modal-kapat" type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title"><b id="gelen_adi">{{ $gelen->menu_adi }}</b> alt menuleri</h5>
        </div>

        <div class="modal-body">
            <h6><span id="gelen_adedi">{{ count($menuler) }}</span>' Adet</h6>
            <h5 class="extent_add">çoklu veya tekli alt menü <span id="coklu_tekli_ekle"><a href="{{ route('yonetim.menu.duzenle', $id) }}">EKLE</a></span></h5>
            <hr>
            <!-- Key table events -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Alt Menü Listesi</h5>
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
                        <th>Menü Adı</th>
                        <th>İçerik</th>
                        <th>Tarih</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menuler as $i => $alt_menu)
                        @if($alt_menu->ana_menusu != NULL)
                            <tr id="tr-{{ $alt_menu->id }}" name="tr-{{ $alt_menu->id }}">
                                <td>{{ $i }}</td>
                                <td>{{ $alt_menu->menu_adi }}</td>
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
        </div>
    </div>
</div>
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
                    $('tr[name=tr-'+ID+']').remove();
                }
            },
            error: function (data) {
                swal(
                    'Silinemedi!',
                    'Menü silinirken hata oluştu!.',
                    'error'
                );
            }
        });
    }
</script>