@extends('yonetim.layouts.master')
@section('title', config('app.name'))
@section('javascript')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/libraries/jasny_bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/selects/bootstrap_select.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/libraries/jquery_ui/core.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/selects/selectboxit.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/tags/tagsinput.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/tags/tokenfield.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/inputs/touchspin.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/inputs/maxlength.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/inputs/formatter.min.js"></script>

    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/app.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/pages/form_floating_labels.js"></script>
    <!-- /theme JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/pages/components_notifications_pnotify.js"></script>
    <!-- /theme JS files -->

    <!-- ck editor -->
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}ckeditor/ckeditor.js"></script>
    <!-- ck editor -->
@endsection
@section('pagehead')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Ürünler</span> - Ürün Ekle</h4>
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
                <li><a href="{{ config('app.url').'yonetim' }}"><i class="icon-home2 position-left"></i> Anasayfa</a></li>
                <li><a href="{{ config('app.url').'yonetim/kategori' }}">Ürünler</a></li>
                <li class="active">Ekle</li>
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
    <div class="content">
        <!-- Floating labels -->
        <div class="row">
            <form action="{{ route('yonetim.urun.ekle') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-12">

                    <!-- Title -->
                    <h6 class="content-group text-semibold">
                        Ürün Ekle
                        <small class="display-block">ürün eklemek için alanları doldurun.</small>
                    </h6>
                    <!-- /title -->

                    <!-- Text inputs -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Ürün Ekle</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            <input name="id" type="hidden" value="{{ $gelen->id }}">

                            <div class="form-group">
                                <select name="alt_kategori" class="select select-search">
                                    <option selected value="0">Alt kategori seçin</option>
                                    @foreach($kategoriler as $i => $kategori)
                                        <optgroup label="{{ $kategori->kategori_adi }}">
                                            @foreach($kategori->children as $alt_kategori)
                                                <option {{ $alt_kategori->id == $gelen->urun_kategorileri ? 'selected' : '' }} value="{{ $alt_kategori->id }}">{{ $alt_kategori->kategori_adi }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group form-group-material">
                                <label class="control-label">Ürün Adı</label>
                                <input required value="{{ $gelen->urun_adi }}" name="title" type="text" class="form-control" placeholder="Ürün adı">
                            </div>

                            <div class="form-group form-group-material">
                                <label class="control-label">Ürün Linki</label>
                                <input required value="{{ $gelen->sef_link }}" name="link" type="text" class="form-control" placeholder="Ürün linki">
                            </div>

                            <div class="form-group form-group-material">
                                <label class="display-block control-label has-margin">Resim Ekle</label>
                                <input name="img" type="file" class="form-control">
                                @if ( $gelen->img != NULL )
                                    <img style="width: 100%; height: auto;" src="{{ config('app.url').'img/'.$gelen->urun_img }}" alt="">
                                @endif
                            </div>

                            <div class="form-group form-group-material">
                                <label class="control-label">Eski Fiyatı</label>
                                <input required value="{{ $gelen->eski_fiyati }}" name="eski_fiyati" type="text" class="form-control" placeholder="Ürün Eski fiyatı">
                            </div>

                            <div class="form-group form-group-material">
                                <label class="control-label">Şuanki Fiyatı</label>
                                <input required value="{{ $gelen->fiyati }}" name="fiyati" type="text" class="form-control" placeholder="Ürün fiyatı">
                            </div>
                        </div>
                    </div>
                    <!-- /text inputs -->

                </div>

                <div class="col-md-12">

                    <!-- Title -->
                    <h6 class="content-group text-semibold">
                        Ürün Ekstraları
                    </h6>
                    <!-- /title -->

                    <!-- Text inputs -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">


                            <div class="form-group form-group-material">
                                <label class="control-label">Stok Adedi</label>
                                <input required name="stok_adedi" type="text" class="form-control" placeholder="Stok adedi">
                            </div>

                            <div class="form-group form-group-material">
                                <label class="control-label">Stok Cinsi</label>
                                <input required name="stok_turu" type="text" class="form-control" placeholder="Adet veya Kg">
                            </div>

                            <div class="form-group form-group-material">
                                <label class="control-label">Renkleri</label>
                                <input required name="renkleri" type="text" class="form-control" placeholder="Kırmızı, Mavi, Yeşil">
                            </div>

                            <div class="form-group form-group-material">
                                <label class="control-label">Markası</label>
                                <input required name="marka" type="text" class="form-control" placeholder="Markası">
                            </div>

                            <div class="form-group form-group-material">
                                <label class="control-label">Adedi</label>
                                <input required name="stok_cinsi" type="text" class="form-control" placeholder="xl, l, m, s">
                            </div>



                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Ürün oluştur <i class="icon-arrow-right14 position-right"></i></button>
                            </div>

                        </div>
                    </div>
                    <!-- /text inputs -->
                </div>

                <div class="col-md-12">

                    <!-- Title -->
                    <h6 class="content-group text-semibold">
                        Ürün içeriği giriniz
                    </h6>
                    <!-- /title -->

                    <!-- Text inputs -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="form-group form-group-material">
                                <label class="control-label">Ürün İçeriği Giriniz</label>
                                <textarea id="editor-full" name="text" rows="5" cols="5" class="form-control" placeholder="Ürün açıklaması">{{ $gelen->urun_aciklama }}</textarea>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Ürün oluştur <i class="icon-arrow-right14 position-right"></i></button>
                            </div>

                        </div>
                    </div>
                    <!-- /text inputs -->
                </div>
            </form>
        </div>
        <!-- /floating labels -->

    </div>
@endsection
@section('ajax')
    <script>
        $('input[name=title]').on('keyup', function () {
            $('input[name=link]').val(ToSeoUrl($(this).val()));
        });

        @if ( count($errors) > 0 )
        setTimeout(function(){
            new PNotify({
                title: 'Ekleme işlemi yapılamadı',
                text: 'Lütfen gerekli alanları doldurun.',
                addclass: 'bg-danger'
            });
        }, 1000);
        @endif

        @if ( session('mesaj_tur') == 'success' )
        setTimeout(function(){
            new PNotify({
                title: 'Ekleme işlemi başarılı',
                text: 'Yeni ekleme işlemi yapabilirsiniz.',
                addclass: 'bg-success'
            });
        }, 1000);
        @endif

        @if ( session('mesaj_tur') == 'info' )
        setTimeout(function(){
            new PNotify({
                title: 'Güncelleme işlemi başarılı',
                text: 'Yeni ekleme işlemi yapabilirsiniz.',
                addclass: 'bg-success'
            });
        }, 1000);
        @endif

    </script>
@endsection
@section('javascript')
    <script src="{{ config('app.url') }}vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor-full' );
    </script>
@endsection
@section('js')
    <style>
        a.cke_dialog_ui_button {
            display: inline-block;
            padding: 1px;
            margin: 30px 0;
            text-align: center;
            color: #333;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid #DDD;
            border-radius: 2px;
            background: #FFF;
            width: 100%;
        }
        .cke_dialog_ui_hbox_last a {
            margin: 33px 0 !important;
        }
        .cke_dialog_ui_hbox_first a,
        .cke_dialog_ui_hbox_last a {
            display: inline-block;
            padding: 10px;
            margin: 33px 0;
            text-align: center;
            color: #333;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid #DDD;
            border-radius: 2px;
            background: #FFF;
            width: 100%;
        }
    </style>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor-full', {
            filebrowserBrowseUrl: '{{ config('app.url').'admin/ckfinder/ckfinder.html' }}',
            filebrowserImageBrowseUrl: '{{ config('app.url').'admin/'.'ckfinder/ckfinder.html?type=Images' }}',
            filebrowserFlashBrowseUrl: '{{ config('app.url').'admin/'.'ckfinder/ckfinder.html?type=Flash' }}',
            filebrowserUploadUrl: '{{ config('app.url').'admin/'.'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files' }}',
            filebrowserImageUploadUrl: '{{ config('app.url').'admin/'.'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files' }}',
            filebrowserFlashUploadUrl: '{{ config('app.url').'admin/'.'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files' }}'
        } );
    </script>
@endsection