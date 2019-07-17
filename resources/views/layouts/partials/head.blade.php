<!-- HEADER -->
<header>
    <!-- top Header -->
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span>E shop'a hoş geldiniz!</span>
            </div>
            <div class="pull-right">
                <ul class="header-top-links">
                    <li><a href="#">Mağaza</a></li>
                    <li><a href="#">Bülten</a></li>
                    <li><a href="#">Rss</a></li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">TR <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">English (ENG)</a></li>
                            <li><a href="#">Russian (Ru)</a></li>
                            <li><a href="#">French (FR)</a></li>
                            <li><a href="#">Spanish (Es)</a></li>
                        </ul>
                    </li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">TL (<i class="fa fa-try" aria-hidden="true"></i>)<i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">USD ($)</a></li>
                            <li><a href="#">EUR (€)</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div class="" id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="{{ route('anasayfa') }}">
                        <img src="{{ config('app.url') }}img/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <form>
                        <input class="input search-input" type="text" placeholder="Aramak istediğiniz kelime.">
                        <select class="input search-categories">
                            <option value="0">Tüm Kategoride</option>
                            @foreach($kategoriler as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->kategori_adi }}</option>
                            @endforeach
                        </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">

                        @auth
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <strong class="text-uppercase">{{ auth()->user()->adsoyad }} <i class="fa fa-caret-down"></i></strong>
                            </div>
                            <a href="#" class="login-text text-uppercase">Profil</a>
                            /
                            <a href="#" onclick="event.preventDefault(); document.getElementById('cikis-yap').submit()" class="login-text text-uppercase">Çıkış</a>
                            <ul class="custom-menu">
                                <li><a href="#"><i class="fa fa-user-o"></i> Profilim</a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i> Alış-Veriş Listem</a></li>
                                <li><a href="#"><i class="fa fa-exchange"></i> Karşılaştırmalarım</a></li>
                                <li><a href="#"><i class="fa fa-check"></i> Takip Ettiklerim</a></li>
                                <li><a href="#"><i class="fa fa-heart-o"></i> Beğendiklerim / Puan Verdiklerim</a></li>
                            </ul>
                        @endauth

                        @guest
                        <a href="{{ route('oturum.kaydol') }}" class="text-uppercase"><i class="login-icon fa fa-user-o"></i>Kayıt Ol</a> / <a href="{{ route('oturum.ac') }}" class="text-uppercase"><i class="login-icon fa fa-unlock" aria-hidden="true"></i>Giriş Yap</a>
                        @endguest

                    </li>
                    <!-- /Account -->

                    <!-- Sepet -->
                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span id="qty" class="qty">{{ count(Cart::content())>0 ? Cart::count() : '0' }}</span>
                            </div>
                            <strong class="text-uppercase">Toplam:</strong>
                            <br>
                            <span><span id="cart-sub-total">{{ count(Cart::content())>0 ? Cart::subtotal() : '0.00' }}</span> <i class="fa fa-try" aria-hidden="true"></i></span>
                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <section id="new-add-carts">
                                @foreach(Cart::content() as $sepettekiler)
                                    <div id="{{ $sepettekiler->rowId }}" class="shopping-cart-list">
                                            <div class="product product-widget">
                                                <div class="product-thumb">
                                                    <img src="{{ config('app.url').'img/'.$sepettekiler->options->img }}" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3><del class="product-old-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $sepettekiler->options->eski_fiyati }}</del></h3>
                                                    <h2 class="product-price"><i class="fa fa-try" aria-hidden="true"></i>{{ $sepettekiler->price }} <span class="qty_extended qty">X</span> <span class="new_qty">{{ $sepettekiler->qty }}</span></h2>
                                                    <h3 class="product-name"><a href="{{ config('app.url').'urun/'.$sepettekiler->options->link }}">{{ $sepettekiler->name }}</a></h3>
                                                </div>
                                                <a id="sepet_{{ $sepettekiler->rowId }}" class="cart-empty cancel-btn"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                @endforeach
                                </section>
                                <section style="{{ count(Cart::content()) > 0 ? '' : 'display:none' }}" id="cart-buttons">
                                    <div class="row shopping-cart-btns">
                                        <div class="col-md-6">
                                            <a style="width: 100%" href="{{ route('sepet') }}" class="main-btn">Görüntüle</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a style="width: 100%" href="{{ route('satinal') }}" class="primary-btn">Satın Al <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </section>
                                <h3 id="carts-h3" style="{{ count(Cart::content()) > 0 ? 'display:none' : '' }}">Sepet Boş</h3>
                            </div>
                        </div>
                    </li>
                    <!-- /Cart -->

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
<!-- /HEADER -->
<form action="{{ route('oturum.cikis') }}" id="cikis-yap" method="post" style="display: none">
    {{ csrf_field() }}
</form>