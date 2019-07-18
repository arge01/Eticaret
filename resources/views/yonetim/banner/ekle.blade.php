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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Banner</span> - Banner Ekle</h4>
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
                <li><a href="{{ config('app.url').'yonetim/banner/listele' }}">Banner</a></li>
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
            <form action="{{ route('yonetim.banner.ekle') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-6">

                    <!-- Title -->
                    <h6 class="content-group text-semibold">
                        Banner Ekle
                        <small class="display-block">banner eklemek için alanları doldurun.</small>
                    </h6>
                    <!-- /title -->

                    <!-- Text inputs -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Banner Ekle</h5>
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
                                <label class="control-label">Banner Adı</label>
                                <input value="{{ $gelen->title }}" name="title" type="text" class="form-control" placeholder="Banner adı">
                            </div>

                            <div class="form-group form-group-material">
                                <label class="control-label">Banner Linki</label>
                                <input value="{{ $gelen->link }}" name="link" type="text" class="form-control" placeholder="Banner linki">
                            </div>

                            <div class="form-group form-group-material">
                                <label class="display-block control-label has-margin">Resim Ekle</label>
                                <input name="img" type="file" class="form-control">
                                @if ( $gelen->img != NULL )
                                    <img style="width: 100%; height: auto;" src="{{ config('app.url').'img/'.$gelen->img }}" alt="">
                                @endif
                            </div>

                            <div class="form-group form-group-material">
                                <label class="control-label">Örn: %50 indirim</label>
                                <input value="{{ $gelen->label }}" name="label" type="text" class="form-control" placeholder="Banner Başlığı">
                                <span class="help-block">Banner Başlığı</span>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Banner oluştur <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- /text inputs -->

                </div>
                <div class="col-md-6">

                    <!-- Title -->
                    <h6 class="content-group text-semibold">
                        Açıklama Ekle
                        <small class="display-block">banner açıklaması giriniz.</small>
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
                                <label class="control-label">Banner Açıklaması</label>
                                <textarea name="text" rows="5" cols="5" class="form-control" placeholder="Banner açıklaması">{{ $gelen->text }}</textarea>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Banner oluştur <i class="icon-arrow-right14 position-right"></i></button>
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
                text: 'Lütfen tüm alanları doldurun.',
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