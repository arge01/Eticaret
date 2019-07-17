@extends('layouts.master')
@section('title', config('app.name').' | '.$urun->urun_adi)
@section('content')

    @php
        $i = 0;
        function indirimYuzdesi($eski_fiyati, $fiyati){
            $yuzdesi = $fiyati * 100 / $eski_fiyati;
            $yuzdesi = 100 - $yuzdesi;
            return number_format($yuzdesi, 1);
        }
    @endphp

    <!-- NAVIGATION -->
    <div id="navigation">
        <!-- container -->
        <div class="container">
            <div id="responsive-nav">
                <!-- category nav -->
                <div class="category-nav show-on-click">
                    @include('layouts.partials.navbar')
                </div>
                <!-- /category nav -->

                <!-- menu nav -->
                <div class="menu-nav">
                    @include('layouts.partials.menu')
                </div>
                <!-- menu nav -->
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('anasayfa') }}">Anasayfa</a></li>
                <li class="active">{{ $ana_kategorisi->kategori_adi }}</li>
                <li><a href="{{ config('app.url').'kategori/'.$ana_kategorisi->sef_link.'/'.$alt_kategorisi->sef_link }}">{{ $alt_kategorisi->kategori_adi }}</a></li>
                <li class="active">{{ $urun->urun_adi }}</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            @foreach($urun->urun_resimleri as $resimler)
                            <div class="product-view">
                                <img src="{{ config('app.url').'img/'.$resimler->urun_img }}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div id="product-view">
                            @foreach($urun->urun_resimleri as $resimler)
                            <div class="product-view">
                                <img src="{{ config('app.url').'img/'.$resimler->urun_img }}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            <div class="product-label">
                                <span>Yeni Ürün</span>
                                <span class="sale">%{{ indirimYuzdesi($urun->eski_fiyati, $urun->fiyati) }} İndirim</span>
                            </div>
                            <h2 class="product-name">{{ $urun->urun_adi }}</h2>
                            <h3 class="product-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $urun->fiyati }} <del class="product-old-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $urun->eski_fiyati }}</del></h3>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <a href="#">{{ count($yorumlar) }} Yorum yapılmış / Yorum Ekle</a>
                            </div>
                            <p><strong>Stok Durumu:</strong> {{ $urun->urun_stok->stok_adedi.' '.$urun->urun_stok->stok_turu }}</p>
                            <p><strong>Marka:</strong> {{ $urun->urun_stok->marka }}</p>
                            <p>
                                {{ $urun->urun_aciklama }}
                            </p>
                            <div class="product-options">
                                {{--<ul class="color-option">
                                    <li><span class="text-uppercase">Renk:</span></li>
                                    <li class="active"><a href="#" style="background-color:#475984;"></a></li>
                                    <li><a href="#" style="background-color:#8A2454;"></a></li>
                                    <li><a href="#" style="background-color:#BF6989;"></a></li>
                                    <li><a href="#" style="background-color:#9A54D8;"></a></li>
                                </ul>--}}
                            </div>

                            <div class="product-btns">
                                <div class="qty-input">
                                    <span class="text-uppercase">Ekle: </span>
                                    <input value="1" placeholder="1 - {{ $urun->urun_stok->stok_adedi }}" class="input" type="number">
                                </div>
                                <select class="product-ext" name="size">
                                    @php
                                    $stok_cinsi = explode(',', $urun->urun_stok->stok_cinsi);
                                    foreach($stok_cinsi as $i => $key) {
                                        echo '<option value="'.$i.'">'.$key.'</option>';
                                    }
                                    @endphp
                                </select>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Sepete Ekle</button>
                                <div class="pull-right">
                                    <button title="Beğen" class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button title="Karşılaştır" class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button title="Paylaş" class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Açıklamalar</a></li>
                                <li><a data-toggle="tab" href="#tab2">Ürün Detayları</a></li>
                                <li><a data-toggle="tab" href="#tab3">Yorumlar ({{ count($yorumlar) }})</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <p>
                                        {{ $urun->urun_aciklama }}
                                    </p>
                                </div>
                                <div id="tab2" class="tab-pane fade in">
                                    <p>
                                        {{ $urun->urun_aciklama }}
                                    </p>
                                    <p>
                                        {{ $urun->urun_aciklama }}
                                    </p>
                                </div>
                                <div id="tab3" class="tab-pane fade in">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="product-reviews">
                                                @foreach($yorumlar as $yorum)
                                                <div class="single-review">
                                                    <div class="review-heading">
                                                        <div><a href="#"><i class="fa fa-user-o"></i> {{ 'Misafir' }}</a></div>
                                                        <div><a href="#"><i class="fa fa-clock-o"></i> {{ $yorum->guncelleme_tarihi }}</a></div>
                                                        <div class="review-rating pull-right">
                                                            <i class="fa fa-star{{ $yorum->puani >= 1 ? '': '-o empty' }}"></i>
                                                            <i class="fa fa-star{{ $yorum->puani >= 2 ? '': '-o empty' }}"></i>
                                                            <i class="fa fa-star{{ $yorum->puani >= 3 ? '': '-o empty' }}"></i>
                                                            <i class="fa fa-star{{ $yorum->puani >= 4 ? '': '-o empty' }}"></i>
                                                            <i class="fa fa-star{{ $yorum->puani >= 5 ? '': '-o empty' }}"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>
                                                            {{ $yorum->yorum }}
                                                        </p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">Yorum bırakmak ister misiniz?</h4>
                                            <p>* lı alanlar mecburidir.</p>
                                            <form class="review-form">
                                                <div class="form-group">
                                                    <input class="input" type="text" placeholder="* Adınız Soyadınız" />
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="input" placeholder="* Yorumunuz"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-rating">
                                                        <strong class="text-uppercase">Puanlayın: </strong>
                                                        <div class="stars">
                                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Gönder</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Product Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">İlginizi Çekebilir</h2>
                    </div>
                </div>
                <!-- section title -->

                @foreach($ilginizi_ceker as $urun)
                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                    <!-- Product Single {{ $i++ }} -->
                        <div class="product-thumb">
                            <div class="product-label">
                                <span class="sale">%{{ indirimYuzdesi($urun->urunu->eski_fiyati, $urun->urunu->fiyati) }} İndirim</span>
                            </div>
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> İncele</button>
                            <img src="{{ config('app.url').'img/'.$urun->urunu->urun_img }}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $urun->urunu->fiyati }} <del class="product-old-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $urun->urunu->eski_fiyati }}</del></h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#">{{ $urun->urunu->urun_adi }}</a></h2>
                            <div class="product-btns">
                                <button title="Beğen" class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button title="Karşılaştır" class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Sepete ekle</button>
                            </div>
                        </div>
                        <!-- /Product Single -->
                    </div>
                </div>
                <!-- /Product Single -->
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

@endsection