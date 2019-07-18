<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="{{ config('app.url').'admin/' }}assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ auth()->guard('yonetim')->user()->adsoyad }}</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;Admin
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Anasayfa</span> <i class="icon-menu" title="Anasayfa Ayarları"></i></li>
                    <!-- iletişim bilgileri -->
                    <li class="{{ request()->is('yonetim/anasayfa') ? 'active' : '' }}"><a href="{{ route('yonetim.anasayfa') }}"><i class="icon-home4"></i> <span>Anasayfa</span></a></li>
                    <li>
                        <a href="#"><i class="icon-books"></i> <span>Kategori Ayarları</span></a>
                        <ul>
                            {{--<li class="{{ request()->is('yonetim/kategori') ? 'active' : '' }}" ><a href="{{ route('yonetim.kategori') }}">Kategori Hızlı Liste</a></li>--}}
                            <li class="{{ request()->is('yonetim/kategori/ekle') ? 'active' : '' }}"><a href="{{ route('yonetim.kategoriekle') }}">Kategori Ekle</a></li>
                            <li class="{{ request()->is('yonetim/kategori/listele') ? 'active' : '' }}"><a href="{{ route('yonetim.kategorilistele') }}">Kategori Düzenle/Sil</a></li>
                            <li><a href="#">Kategori Görünüm Ayarları</a></li>
                            <li><a href="#">Kategori Link Ayarları</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-link2"></i> <span>Menü Ayarları</span></a>
                        <ul>
                            <li class="{{ request()->is('yonetim/menu') ? 'active' : '' }}"><a href="{{ route('yonetim.menu.ekle') }}">Menü Ekle</a></li>
                            <li class="{{ request()->is('yonetim/menu/listele') ? 'active' : '' }}"><a href="{{ route('yonetim.menu.listele') }}">Menü Düzenle/Sil</a></li>
                            <li><a href="#">Menü Görünüm Ayarları</a></li>
                            <li><a href="#">Menü Link Ayarları</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-images3"></i> <span>Banner Ayarları</span></a>
                        <ul>
                            <li class="{{ request()->is('yonetim/banner') ? 'active' : '' }}" ><a href="{{ route('yonetim.banner.ekle') }}">Banner Ekle</a></li>
                            <li class="{{ request()->is('yonetim/banner/listele') ? 'active' : '' }}" ><a href="{{ route('yonetim.banner.listele') }}">Banner Düzenle/Sil</a></li>
                            <li><a href="#">Banner Liste Ayarları</a></li>
                            <li><a href="#">Banner Link Ayarları</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-images3"></i> <span>Alt Slider Ayarları</span></a>
                        <ul>
                            <li class="{{ request()->is('yonetim/alt_banner') ? 'active' : '' }}" ><a href="{{ route('yonetim.alt_banner.ekle') }}">Alt Banner Ekle</a></li>
                            <li class="{{ request()->is('yonetim/alt_banner/listele') ? 'active' : '' }}" ><a href="{{ route('yonetim.alt_banner.listele') }}">Alt Banner Düzenle/Sil</a></li>
                            <li><a href="#">Alt Banner Liste Ayarları</a></li>
                            <li><a href="#">Alt Banner Link Ayarları</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-embed2"></i> <span>/Api</span></a>
                    </li>
                    <!-- /Main -->

                    <!-- Appearance -->
                    <li class="navigation-header"><span>İçerikler</span> <i class="icon-menu" title="Appearance"></i></li>
                    <li>
                        <a href="#"><i class="icon-stack3"></i> <span>İçerik Ayarları</span></a>
                        <ul>
                            <li class="{{ request()->is('yonetim/icerik/ekle') ? 'active' : '' }}"><a href="{{ route('yonetim.ana.icerik.ekle') }}">Alt Menü / İçerki Ekle <span style="font-size: 7pt">(menü oluşturarak)</span></a></li>
                            <li class="{{ request()->is('yonetim/icerik') ? 'active' : '' }}"><a href="{{ route('yonetim.icerik.ekle') }}">Link / İçerki Ekle <span style="font-size: 7pt">(alt menüye/link oluşturarak)</span></a></li>
                            <li class="{{ request()->is('yonetim/icerik/listele') ? 'active' : '' }}"><a href="{{ route('yonetim.icerik.listele') }}">İçerik Düzünle/Sil</a></li>
                            <li><a href="">İçerik İlişki Ayarları</a></li>
                        </ul>
                    </li>
                    <!-- /appearance -->

                    <!-- Appearance -->
                    <li class="navigation-header"><span>Ürünler</span> <i class="icon-menu" title="Appearance"></i></li>
                    <li>
                        <a href="#"><i class="icon-grid"></i> <span>Ürün Ayarları</span></a>
                        <ul>
                            <li class="{{ request()->is('yonetim/urun') ? 'active' : '' }}"><a href="{{ route('yonetim.urun.ekle') }}">Ürün Ekle</a></li>
                            <li class="{{ request()->is('yonetim/urun/listele') ? 'active' : '' }}"><a href="{{ route('yonetim.urun.listele') }}">Ürün Düzünle/Sil</a></li>
                            <li><a href="">Ürün Görünüm Ayarları</a></li>
                        </ul>
                    </li>
                    <!-- /appearance -->

                    <!-- Appearance -->
                    <li class="navigation-header"><span>Referanslar</span> <i class="icon-menu" title="Appearance"></i></li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-star"></i> <span>Referans Ayarları</span></a>
                        <ul>
                            <li class="{{ request()->is('yonetim/referans') ? 'active' : '' }}"><a href="{{ route('yonetim.referans.ekle') }}">Referans Ekle</a></li>
                            <li class="{{ request()->is('yonetim/referans/listele') ? 'active' : '' }}"><a href="{{ route('yonetim.referans.listele') }}">Referans Düzünle/Sil</a></li>
                            <li><a href="">Referans Görünüm Ayarları</a></li>
                        </ul>
                    </li>
                    <!-- /appearance -->

                    <!-- Appearance -->
                    <li class="navigation-header"><span>Galeriler</span> <i class="icon-menu" title="Appearance"></i></li>
                    <li>
                        <a href="#"><i class="icon-file-picture"></i> <span>Galeri Ayarları</span></a>
                        <ul>
                            <li class="{{ request()->is('yonetim/resim/ekle'.'/yeni') ? 'active' : '' }}"><a href="{{ route('yonetim.resim.ekle', 'yeni') }}">Galeri Ekle</a></li>
                            <li class="{{ request()->is('yonetim/resim/listele') ? 'active' : '' }}"><a href="{{ route('yonetim.resim.listele') }}">Galeri Düzünle/Sil</a></li>
                            <li><a href="">Galeri Görünüm Ayarları</a></li>
                        </ul>
                    </li>
                    <!-- /appearance -->

                    <!-- Layout -->
                    <li class="navigation-header"><span>Üyeler</span> <i class="icon-menu" title="Layout options"></i></li>
                    <li>
                        <a href="#"><i class="icon-indent-decrease2"></i> <span>Üye Ayarları</span></a>
                        <ul>
                            <li><a>Üye yönetimi bulunmamakta!</a></li>
                        </ul>
                    </li>
                    <!-- /layout -->

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>