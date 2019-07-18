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
@endsection
@section('pagehead')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Kategoriler</span> - Kategori Ekle</h4>
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
                <li><a href="{{ config('app.url').'yonetim/kategori' }}">Kategoriler</a></li>
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
            <form action="{{ route('yonetim.kategoriekle') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-6">

                    <!-- Title -->
                    <h6 class="content-group text-semibold">
                        Ana Kategori Ekle
                        <small class="display-block">ana kategori eklemek için alanları doldurun.</small>
                    </h6>
                    <!-- /title -->

                    <!-- Text inputs -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Ana Kategori</h5>
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

                            <div class="form-group form-group-material">
                                <label class="control-label">Kategori Adı</label>
                                <input value="{{ $gelen->kategori_adi }}" name="kategori_adi" type="text" class="form-control" placeholder="Kategori adı">
                            </div>

                            <div class="form-group form-group-material">
                                <label class="control-label">Kategori Link</label>
                                <input value="{{ $gelen->sef_link }}" name="kategori_link" type="text" class="form-control" placeholder="Kategori link">
                            </div>

                            <div class="form-group form-group-material">
                                <label class="control-label">Örn: İçecekler</label>
                                <input value="{{ $resim_baslik }}" name="resim_baslik" type="text" class="form-control" placeholder="Kategori Alt Başlığı">
                                <span class="help-block">Kategori Alt Başlığı</span>
                            </div>
                            
                            <div class="form-group form-group-material">
                                <label class="display-block control-label has-margin">Ana Resim Ekle</label>
                                <input name="img" type="file" class="form-control">
                                @if ( $gelen->img != NULL )
                                <img style="width: 100%; height: auto;" src="{{ config('app.url').'img/'.$gelen->img }}" alt="">
                                @endif
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Ana kategori oluştur <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- /text inputs -->

                </div>
                <div class="col-md-6">

                    <!-- Title -->
                    <h6 class="content-group text-semibold">
                        Alt Kategori Ekle
                        <small class="display-block">alt kategorileri belirleyin / seçin.</small>
                    </h6>
                    <!-- /title -->

                    <!-- Text inputs -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Alt Kategori Ekle</h5>
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
                                <label class="control-label has-margin">Alt kategori ekle</label>
                                <input name="alt_kategori1" value="@foreach($gelen->children as $alt_kategoriler) {{ $alt_kategoriler->kategori_adi.',' }} @endforeach" id="tags-input" type="text" class="tags-input" placeholder="- Alt kategori ekle">
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Ana kategori oluştur <i class="icon-arrow-right14 position-right"></i></button>
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
        $('input[name=kategori_adi]').on('keyup', function () {
            $('input[name=kategori_link]').val(ToSeoUrl($(this).val()));
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