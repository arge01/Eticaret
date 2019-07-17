@extends('layouts.master')
@section('title', config('app.name'))
@section('content')

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
                <li class="active">Sepetteki Ürünleriniz</li>
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
                @if( count(Cart::content()) > 0 )
                <form id="checkout-form" class="clearfix">
                    <div class="col-md-12">
                        <div class="order-summary clearfix">
                            <div class="section-title">
                                <h3 class="title">Sepetiniz</h3>
                            </div>
                            <table class="shopping-cart-table table">
                                <thead>
                                <tr>
                                    <th>Ürün</th>
                                    <th></th>
                                    <th class="text-center">Fiyatı</th>
                                    <th class="text-center">Adet</th>
                                    <th class="text-center">Toplam</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::content() as $urun)
                                <tr>
                                    <td class="thumb"><img src="{{ config('app.url').'img/'.$urun->options->img }}" alt=""></td>
                                    <td class="details">
                                        <a href="{{ config('app.url').'urun/'.$urun->options->link }}">{{ $urun->name }}</a>
                                        <ul>
                                            <li>
                                                <span>Size: </span>
                                                <select id="size_{{ $urun->rowId }}" class="select-tr size" name="size">
                                                    @if($urun->options->size != NULL)
                                                    <option selected value="{{ $urun->options->size }}">{{ $urun->options->size }}</option>
                                                    @else
                                                    <option value="0">Belirtilmemiş</option>
                                                    @endif
                                                    <option value="xl">XL</option>
                                                    <option value="l">L</option>
                                                    <option value="m">M</option>
                                                    <option value="s">S</option>
                                                    <option value="xs">XS</option>
                                                </select>
                                            </li>
                                            <li>
                                                <span>Renk: </span>
                                                <select id="renk_{{ $urun->rowId }}" class="select-tr renk" name="renk">
                                                    @if($urun->options->renk != NULL)
                                                    <option selected value="{{ $urun->options->size }}">{{ $urun->options->renk }}</option>
                                                    @else
                                                    <option value="0">Belirtilmemiş</option>
                                                    @endif
                                                    <option value="kirmizi">Kırmızı</option>
                                                    <option value="mavi">Mavi</option>
                                                    <option value="sari">Sarı</option>
                                                    <option value="yesil">Yeşil</option>
                                                    <option value="kahverengi">Kahverengi</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="price text-center">
                                        <strong><i class="fa fa-try" aria-hidden="true"></i>{{ $urun->price }}</strong>
                                        <br>
                                        <del class="font-weak"><small><i class="fa fa-try" aria-hidden="true"></i>{{ $urun->options->eski_fiyati }}</small></del>
                                    </td>
                                    <td class="qty text-center"><input id="adet_{{ $urun->rowId }}" class="adet input" type="number" value="{{ $urun->qty }}"></td>
                                    <td class="total text-center"><strong class="primary-color"><i class="fa fa-try" aria-hidden="true"></i>{{ $urun->subtotal }}</strong></td>
                                    <td class="text-right"><a id="cart_{{ $urun->rowId }}" class="cart-empty main-btn icon-btn"><i class="fa fa-close"></i></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                @php
                                if(Cart::subtotal() > 250){
                                    $kargo = 0.00;
                                    $kargoName = 'Bizden';
                                }
                                else{
                                    $kargo = 20.00;
                                    $kargoName = '20.00';
                                }
                                $toplamTutar = Cart::total() + $kargo;
                                @endphp
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>Toplam Tutar + KDV</th>
                                    <th colspan="2" class="sub-total"><i class="fa fa-try"></i>{{ Cart::subtotal().' + '.'%18' }}</th>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>Toplam Tutar <span>(KDV dahil)</span></th>
                                    <th colspan="2" class="sub-total"><i class="fa fa-try"></i>{{ Cart::total() }}</th>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>Kargo Ücreti</th>
                                    <td colspan="2"><i class="fa fa-try" aria-hidden="true"></i>{{ $kargoName }}</td>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>Toplam Ödenecek</th>
                                    <th colspan="2" class="total"><i class="fa fa-try"></i>{{ number_format( $toplamTutar, 2 ) }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="billing-details">
                            <p>Already a customer ? <a href="#">Login</a></p>
                            <div class="section-title">
                                <h3 class="title">Billing Details</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="first-name" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="last-name" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="tel" placeholder="Telephone">
                            </div>
                            <div class="form-group">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="register">
                                    <label class="font-weak" for="register">Create Account?</label>
                                    <div class="caption">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                                        <p>
                                            <input class="input" type="password" name="password" placeholder="Enter Your Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="shiping-methods">
                            <div class="section-title">
                                <h4 class="title">Shiping Methods</h4>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="shipping" id="shipping-1" checked>
                                <label for="shipping-1">Free Shiping -  $0.00</label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    <p>
                                </div>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="shipping" id="shipping-2">
                                <label for="shipping-2">Standard - $4.00</label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    <p>
                                </div>
                            </div>
                        </div>

                        <div class="payments-methods">
                            <div class="section-title">
                                <h4 class="title">Payments Methods</h4>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="payments" id="payments-1" checked>
                                <label for="payments-1">Direct Bank Transfer</label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    <p>
                                </div>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="payments" id="payments-2">
                                <label for="payments-2">Cheque Payment</label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    <p>
                                </div>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="payments" id="payments-3">
                                <label for="payments-3">Paypal System</label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="pull-right">
                            <button class="primary-btn">Satın Al</button>
                        </div>
                    </div>
                    @else
                        <div class="empty-content">
                        <h1>Sepetiniz şu an boş, <a href="#">ürün</a> eklemek ister misiniz?</h1>
                        <br>
                        </div>
                    @endif
                </form>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection