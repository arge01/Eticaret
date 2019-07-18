<div id="products" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Ürünler</h2>
                </div>
            </div>
            <!-- section title -->
        @foreach($tum_urunler as $urun)
            <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span>Yeni Ürün</span>
                                <span class="sale">%{{ indirimYuzdesi($urun->eski_fiyati, $urun->fiyati) }} İndirim</span>
                            </div>
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> İncele</button>
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
                                <a href="{{ route('urunler', $urun->sef_link) }}" id="tumUrunler_{{ $urun->id }}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Sepete ekle</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
            @endforeach
            <div class="col-md-12">
                <div class="paginate">
                    {{ $tum_urunler->fragment('products')->links() }}
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>