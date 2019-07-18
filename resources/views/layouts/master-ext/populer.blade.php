<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Popüler Ürünler</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-2 custom-dots">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section title -->

            <!-- Product Single -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single product-hot">
                    <div class="product-thumb">
                        <div class="product-label">
                            <span class="sale">%{{ indirimYuzdesi($en_iyi_indirim->children->eski_fiyati, $en_iyi_indirim->children->fiyati) }} İndirim</span>
                        </div>
                        <ul class="product-countdown">
                            <li><span>00 H</span></li>
                            <li><span>00 M</span></li>
                            <li><span>00 S</span></li>
                        </ul>
                        <a href="{{ route('urunler', $en_iyi_indirim->children->sef_link) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> İncele</a>
                        <img src="{{ config('app.url').'img/'.$en_iyi_indirim->children->urun_img }}" alt="">
                    </div>
                    <div class="product-body">
                        <h3 class="product-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $en_iyi_indirim->children->fiyati }} <del class="product-old-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $en_iyi_indirim->children->eski_fiyati }}</del></h3>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                        </div>
                        <h2 class="product-name"><a href="#">{{ $en_iyi_indirim->children->urun_adi }}</a></h2>
                        <div class="product-btns">
                            <button title="Beğen" class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                            <button title="Karşılaştır" class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                            <a id="eniyi_{{ $en_iyi_indirim->children->id }}" href="#" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Sepete ekle</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Single -->

            <!-- Product Slick -->
            <div class="col-md-9 col-sm-6 col-xs-6">
                <div class="row">
                    <div id="product-slick-2" class="product-slick">
                        @foreach($haftanin_urunleri as $urun)
                        <!-- Product Single -->
                        <div class="product product-single">
                            <!-- Product Single {{ $i++ }} -->
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span class="sale">%{{ indirimYuzdesi($urun->children->eski_fiyati, $urun->children->fiyati) }} İndirim</span>
                                    </div>
                                    <a href="{{ route('urunler', $urun->children->sef_link) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> İncele</a>
                                    <img src="{{ config('app.url').'img/'.$urun->children->urun_img }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $urun->children->fiyati }} <del class="product-old-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $urun->children->eski_fiyati }}</del></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"><a href="#">{{ $urun->children->urun_adi }}</a></h2>
                                    <div class="product-btns">
                                        <button title="Beğen" class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button title="Karşılaştır" class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <button id="enIyiUrun_{{ $urun->children->id }}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Sepete ekle</button>
                                    </div>
                                </div>
                                <!-- /Product Single -->
                            </div>
                        <!-- /Product Single -->
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <!-- section-title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Günün Ürünleri</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-1 custom-dots"></div>
                    </div>
                </div>
            </div>
            <!-- /section-title -->

            <!-- Product Single -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single product-hot">
                    <div class="product-thumb">
                        <div class="product-label">
                            <span>Yeni Ürün</span>
                            <span class="sale">%{{ indirimYuzdesi($son_firsat_urun->eski_fiyati, $son_firsat_urun->fiyati) }} İndirim</span>
                        </div>
                        <ul class="product-countdown">
                            <li><span>00 H</span></li>
                            <li><span>00 M</span></li>
                            <li><span>00 S</span></li>
                        </ul>
                        <a href="{{ route('urunler', $son_firsat_urun->sef_link) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> İncele</a>
                        <img src="{{ config('app.url').'img/'.$son_firsat_urun->urun_img }}" alt="">
                    </div>
                    <div class="product-body">
                        <h3 class="product-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $son_firsat_urun->fiyati }} <del class="product-old-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $son_firsat_urun->eski_fiyati }}</del></h3>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                        </div>
                        <h2 class="product-name"><a href="#">{{ $son_firsat_urun->urun_adi }}</a></h2>
                        <div class="product-btns">
                            <button title="Beğen" class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                            <button title="Karşılaştır" class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                            <button id="gununUrunu_{{ $son_firsat_urun->id }}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Sepete ekle</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Single -->

            <!-- Product Slick -->
            <div class="col-md-9 col-sm-6 col-xs-6">
                <div class="row">
                    <div id="product-slick-1" class="product-slick">

                        @php $i = 0; @endphp
                        @foreach($gunluk as $urun)
                        <div class="product product-single">
                        <!-- Product Single {{ $i++ }} -->
                            <div class="product-thumb">
                                <div class="product-label">
                                    <span>Yeni Ürün</span>
                                    <span class="sale">%{{ indirimYuzdesi($urun->eski_fiyati, $urun->fiyati) }} İndirim</span>
                                </div>
                                <a href="{{ route('urunler', $urun->sef_link) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> İncele</a>
                                <img src="{{ config('app.url').'img/'.$urun->urun_img }}" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $urun->fiyati }} <del class="product-old-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $urun->eski_fiyati }}</del></h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <h2 class="product-name"><a href="#">{{ $urun->urun_adi }}</a></h2>
                                <div class="product-btns">
                                    <button title="Beğen" class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button title="Karşılaştır" class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button id="gununUrunleri_{{ $urun->id }}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Sepete ekle</button>
                                </div>
                            </div>
                        <!-- /Product Single -->
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>