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
                <li class="active">Kayıt Ol</li>
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
                <form id="loginForm" class="clearfix" method="POST" name="kayit_ol" action="{{ route('oturum.kaydol') }}">
                    {{ csrf_field() }}
                    <div class="col-md-6 col-md-offset-3">
                        <div class="padding-form billing-details">
                            <p>Şifrenizimi unuttunuz ? <a href="#">Şifremi gönder</a></p>
                            <div class="section-title">
                                <h3 class="title">Kayıt olmak için,</h3>
                            </div>
                            <div class="form-group {{ $errors->has('adsoyad') ? 'has-error' : '' }}">
                                <input class="form-control input" type="text" name="adsoyad" placeholder="Adınızı Soyadınızı">
                                @if($errors->has('adsoyad'))
                                <span class="help-block">{{ $errors->first('adsoyad') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <input class="form-control input" type="text" name="email" placeholder="Email Adresinizi">
                                @if($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('sifre') ? 'has-error' : '' }}">
                                <input class="form-control input" type="password" name="sifre" placeholder="Şifrenizi">
                                @if($errors->has('sifre'))
                                    <span class="help-block">{{ $errors->first('sifre') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('sifre') ? 'has-error' : '' }}">
                                <input class="form-control input" type="password" name="sifre_confirmation" placeholder="Şifrenizi Tekrar">
                                @if($errors->has('sifre'))
                                    <span class="help-block">{{ $errors->first('sifre') }}</span>
                                @endif
                            </div>
                            <div class="pull-right">
                                <button name="kayit-ol" class="primary-btn">Giriniz.</button>
                            </div>
                            <div style="clear: both" class="clear"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

@endsection