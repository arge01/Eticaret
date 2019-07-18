<div class="navbar navbar-default header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="{{ config('app.url').'admin/' }}assets/images/logo_light.png" alt=""></a>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <p class="navbar-text"><span class="label bg-success"><a style="color: #fff" target="_blank" href="{{ config('app.url') }}">Siteyi Göster</a></span></p>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-bubbles4"></i>
                    <span class="visible-xs-inline-block position-right">Mesajlar</span>
                    <span class="badge bg-warning-400">0</span>
                </a>

                <div class="dropdown-menu dropdown-content width-350">
                    <div class="dropdown-content-heading">
                        Mesajlar
                        <ul class="icons-list">
                            <li><a href="#"><i class="icon-compose"></i></a></li>
                        </ul>
                    </div>

                    <ul class="media-list dropdown-content-body">
                    </ul>

                    <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="Tüm Gelenler"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ config('app.url').'admin/' }}assets/images/placeholder.jpg" alt="">
                    <span>{{ auth()->guard('yonetim')->user()->adsoyad }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-plus"></i> Profilim</a></li>
                    <li><a href="#"><span class="badge bg-teal-400 pull-right">0</span> <i class="icon-comment-discussion"></i> Mesajlar</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('yonetim.anasayfa') }}"><i class="icon-cog5"></i> Ayarlar</a></li>
                    <li><a href="{{ route('yonetim.oturumkapat') }}"><i class="icon-switch2"></i> Çıkış</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>