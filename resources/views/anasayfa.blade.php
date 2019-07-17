@extends('layouts.master')
@section('title', config('app.name'))
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
                <div class="category-nav">
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

    <!-- HOME -->
    <div id="home">
        <!-- container -->
        <div class="container">
            <!-- home wrap -->
            <div class="home-wrap">
                <!-- home slick -->
                <div id="home-slick">

                    @foreach($slider as $slide)
                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{{ config('app.url').'img/'.$slide->img }}" alt="">
                        <div class="banner-caption2 text-center">
                            <h1>{{ $slide->title }}</h1>
                            <h3 class="white-color font-weak">{{ $slide->label }}</h3>
                            <a href="{{ $slide->link }}" class="primary-btn">Ayrıntılar</a>
                        </div>
                    </div>
                    <!-- /banner -->
                    @endforeach

                </div>
                <!-- /home slick -->
            </div>
            <!-- /home wrap -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOME -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                @foreach($koleksiyon_menu as $menu)
                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1 collection-banner" href="{{ '/cok-satanlar/'.$menu->sef_link }}">
                        @if($menu->img != NULL)
                        <img src="{{ config('app.url').'img/'.$menu->img }}" alt="">
                        @endif
                        <div class="banner-caption text-center">
                            <h2 class="white-color">{{ $menu->aciklama }}</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->
                @endforeach

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    @include('layouts.master-ext.populer')
    <!-- /section -->

    <!-- section -->
    <div class="section section-grey">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- banner -->
                <div class="col-md-12">
                    <div class="banner banner-1">
                        <img src="{{ config('app.url') }}img/banner13.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h1 class="primary-color">Bu Kampanyaları Kaçırmayın!<br><span class="white-color font-weak">Bu fiyatlar son fırsat...</span></h1>
                            <button class="primary-btn">Ürünleri Gör</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    @include('layouts.master-ext.urunler')
    <!-- /section -->
@endsection