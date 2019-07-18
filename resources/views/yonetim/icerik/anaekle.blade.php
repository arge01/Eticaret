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

    <!-- select 2 -->
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/pages/form_select2.js"></script>
    <!-- select 2 -->

    <!-- ck editor -->
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}ckeditor/ckeditor.js"></script>
    <!-- ck editor -->
@endsection
@section('pagehead')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">İçerik</span> - İçerik Ekle</h4>
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
                <li><a href="{{ config('app.url').'yonetim/icerik/listele' }}">İçerikler</a></li>
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
            <form action="{{ route('yonetim.ana.icerik.ekle') }}" method="post">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <!-- Title -->
                    <h6 class="content-group text-semibold">
                        İcerik Ekle
                        <small class="display-block">içerik eklemek için alanları doldurun.</small>
                    </h6>
                    <!-- /title -->

                    <!-- Text inputs -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Menü' seçin</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="open"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <input name="id" type="hidden" value="{{ $gelen->id }}">
                            <div class="form-group">
                                <select name="ana_menu" class="select select-search">
                                    <option selected>Menü seçin</option>
                                    @foreach($menuler as $i => $menu)
                                        <option {{ $new_id == $menu->id ? 'selected' : '' }} value="{{ $menu->id }}">{{ $menu->menu_adi }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <!-- /text inputs -->

                </div>
                <div class="col-md-12">

                    <!-- Text inputs -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">İçerik Ekle</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            <input name="menu" value="0" type="hidden" class="form-control">

                            <div class="form-group form-group-material">
                                <label class="control-label animate">İçerik Başlığı</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-pencil7"></i></span>
                                    <input name="label" type="text" class="form-control" placeholder="İçerik Başlığı">
                                </div>
                            </div>

                            <div class="content-group">
									<textarea class="note-codable" name="icerik" id="editor-full" rows="4" cols="4">
						            </textarea>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn bg-teal-400">İçerik Oluştur <i class="icon-arrow-right14 position-right"></i></button>
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
        $('input[name=menu_adi]').on('keyup', function () {
            $('input[name=sef_link]').val(ToSeoUrl($(this).val()));
        });

        $('.select').on('change', function () {
            $('input[name=icerik_select]').val($(this).find('option:selected').text());
            $('input[name=menu]').val($(this).find('option:selected').val());
            if ( $(this).val() != 0 ){
                $('input[name=link]').val("");
                $('.link_olustur').hide();
            } else {
                $('input[name=link]').val("");
                $('.link_olustur').show();
            }
        });

        $('input[name=link]').on('click', function () {
            $(this).val("{{ route('anasayfa').'/' }}")
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