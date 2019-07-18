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

        <form id="ekle">
            <table id="ana-table" class="table datatable-show-all">
                <thead>
                <tr>
                    <th>Kategori Adı</th>
                    <th>Alt Kategorisi</th>
                    <th>Linki</th>
                    <th>Oluşturma Tarihi</th>
                    <th>E / G</th>
                    <th>B / S</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input id="kategori_adi" name="kategori_adi" type="text" placeholder="Kategori Adı" class="form-control"></td>
                    <td>
                        <input name="ID" type="hidden" value="0" class="form-control">
                        Alt kategorisi yok
                    </td>
                    <td><input id="kategori_link" name="kategori_link" type="text" placeholder="Kategori Link" class="form-control"></td>
                    <td>{{ date('m-d-Y', strtotime($tarih)) }}</td>
                    <td><button id="ekle-0" class="btn btn-default">Ekle <i class="icon-pencil7"></i></button></td>
                    <td><a id="bosalt-0" href="#" class="btn btn-default">Boşalt <i class="icon-trash"></i></a></td>
                </tr>
                @foreach($kategoriler as $i => $kategori)
                <tr id="tr-{{ $kategori->id }}">
                    <td class="{{ $kategori->id }}">{{ $kategori->kategori_adi }}</td>
                    <td><a href="#">{{ count($kategori->children) == 0 ? 'Alt kategorisi yok' : count($kategori->children).'- Adet alt kategori' }}</a></td>
                    <td><a target="_blank" href="{{ config('app.url').'kategori/'.$kategori->sef_link }}">{{ $kategori->kategori_adi }}</a></td>
                    <td>{{ date('m-d-Y', strtotime($kategori->olusturma_tarihi)) }}</td>
                    <td><a id="guncelle-{{ $kategori->id }}" href="#" class="edit btn btn-default" data-toggle="modal" data-target="#guncelle_form">Güncelle <i class="icon-pencil7"></i></a></td>
                    <td><a id="sil-{{ $kategori->id }}" href="#" class="delete btn btn-default">Sil <i class="icon-trash"></i></a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </form>

        <div style="display: none" class="panel-body">
            <pre class="pre-scrollable"><code id="key-events"></code></pre>
        </div>

        <!-- Horizontal form modal -->
        <div id="guncelle_form" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Güncelle</h5>
                    </div>

                    <form id="guncelle" class="form-horizontal">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-sm-3">Kategori adı</label>
                                <div class="col-sm-9">
                                    <input name="kategori_adi" type="text" placeholder="" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label>Ana kategori listesi</label>
                                </div>
                                <div class="col-sm-9">
                                    <input disabled name="ana_kategori" type="text" placeholder="" class="form-control">
                                </div>
                            </div>

                            <div style="display: none;" class="form-group">
                                <div class="col-sm-9">
                                    <input name="ID" type="hidden">
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Cıkış</button>
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /horizontal form modal -->

    </div>
    <!-- /key table events -->
@endsection
@section('ajax')
    @include('yonetim.ajax.kategori.listele')
@endsection