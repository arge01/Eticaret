@extends('yonetim.layouts.master')
@section('javascript')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ config('app.url').'plupload' }}/js/plupload.full.min.js"></script>
    <!-- select 2 -->
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/pages/form_select2.js"></script>
    <!-- select 2 -->
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/app.js"></script>
    <!-- /theme JS files -->
@endsection
@section('title', config('app.name'))
@section('pagehead')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Resimler</span> - Resim Ekle</h4>
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
                <li><a href="{{ config('app.url').'yonetim/kategori' }}">Resim</a></li>
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
        <div class="row">

            <!-- Single file upload -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Resim Yükle Çoklu/ Tekli</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div style="padding-bottom: 0" class="panel-body">
                    <div class="form-group">
                        <select id="urunler" name="urun" class="select select-search">
                            <option value="0">Sunucuya Resim At</option>
                            @foreach($urunler as $i => $urun)
                                <option {{ $id == $urun->id ? 'selected' : '' }} value="{{ route('yonetim.resim.ekle', $urun->id) }}">{{ $urun->urun_adi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div style="padding-top: 0" class="panel-body">
                        <div class="dropzone" id="filelist"></div>
                        <div id="container">
                            <a class="ekle-button" id="pickfiles" href="javascript:;"></a>
                            <a id="uploadfiles" href="javascript:;" type="button"
                               class="btn btn-success btn-float btn-float-lg"><b><i class="icon-folder-upload2"></i></b>
                                Yükle</a>
                        </div>
                        <pre id="console"></pre>
                </div>
            </div>
            <!-- /single file upload -->
        </div>
    </div>

@endsection
@section('ajax')
    <script type="text/javascript">

        $('#urunler').on('change', function () {
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });
        // Custom example logic
        var uploader = new plupload.Uploader({
            runtimes : 'html5,flash,silverlight,html4',
            browse_button : 'pickfiles', // you can pass an id...
            container: document.getElementById('container'), // ... or DOM Element itself
            url : "{{ route('yonetim.resim.ekle', $id ) }}",
            flash_swf_url : '{{ config("app.url")."plupload/" }}js/Moxie.swf',
            silverlight_xap_url : '{{ config("app.url")."plupload/" }}js/Moxie.xap',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            filters : {
                max_file_size : '10mb',
                mime_types: [
                    {title : "Image files", extensions : "jpg,gif,png"},
                    {title : "Zip files", extensions : "zip"}
                ]
            },

            init: {
                PostInit: function() {
                    document.getElementById('filelist').innerHTML = '';

                    document.getElementById('uploadfiles').onclick = function() {
                        uploader.start();
                        return false;
                    };
                },

                FilesAdded: function(up, files) {
                    plupload.each(files, function(file) {
                        document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                    });
                },

                UploadProgress: function(up, file) {
                    document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span style="font-size: 6pt">' + file.percent + "%</span>" + '<span style="color: #4CAF50; font-size: .7em"> /Eklendi...</span>';
                },

                Error: function(up, err) {
                    document.getElementById('console').appendChild(document.createTextNode("\nHata Eklenemedi Lütfen Daha Sonra Tekrar Deneyiniz #" + err.code + ": " + err.message));
                }
            }
        });
        uploader.init();
    </script>
@endsection