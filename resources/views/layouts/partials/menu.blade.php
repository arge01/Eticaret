<span class="menu-header">Menü <i class="fa fa-bars"></i></span>
<ul class="menu-list">
    <li><a href="{{ route('anasayfa') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
    @foreach($menuler as $menu)
        <li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{ $menu->menu_adi }} <i class="fa fa-caret-down"></i></a>
            <div class="custom-menu">
                <div class="row">
                    @foreach($menu->child as $altmenu)
                        <div class="col-md-3">
                            <ul class="list-links full-li-list-links">
                                <li><h3 class="list-links-title">{{ $altmenu->menu_adi }}</h3></li>
                                @foreach($altmenu->child as $altmenu_child)
                                    <li><a href="#">{{ $altmenu_child->menu_adi }}</a></li>
                                @endforeach
                            </ul>
                            <hr class="hidden-md hidden-lg">
                        </div>
                    @endforeach
                    @foreach($menu->category as $altmenu)
                        <div class="col-md-3">
                            <ul class="list-links full-li-list-links">
                                <li><a href="#">{{ $altmenu->kategori_adi }}</a></li>
                            </ul>
                            <hr class="hidden-md hidden-lg">
                        </div>
                    @endforeach
                </div>
                <div class="row hidden-sm hidden-xs">
                    <div class="col-md-12">
                        <hr>
                        @if($menu->ana_img != NULL)
                            <a class="banner banner-1" href="#">
                                <img src="{{ config('app.url') }}img/{{ $menu->ana_img }}" alt="">
                                <div class="banner-caption text-center">
                                    {!! $menu->ana_img_yazi !!}
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </li>
    @endforeach
    <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Teslimat / Sözleşme <i class="fa fa-caret-down"></i></a>
        <ul class="custom-menu">
            <li><a href="index.html">Hakkımızda</a></li>
            <li><a href="products.html">Satış Sözleşmesi</a></li>
            <li><a href="checkout.html">Satın Alma İşlemi</a></li>
        </ul>
    </li>
</ul>