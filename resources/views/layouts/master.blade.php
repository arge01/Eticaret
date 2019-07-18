<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="shortcut icon" type="image/x-icon" href="{{ config('app.url') }}img/favicon.png">

    <title>@yield('title', config('app.name'))</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700&amp;subset=latin-ext" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ config('app.url') }}css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ config('app.url') }}css/slick.css" />
    <link type="text/css" rel="stylesheet" href="{{ config('app.url') }}css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ config('app.url') }}css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ config('app.url') }}css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ config('app.url') }}css/style.css" />
    <!-- Extended css -->
    @yield('css')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div id="alerts" class="container">
        <div class="alert alert-{{ session('mesaj_tur') }}">{{ session('mesaj') }}</div>
    </div>
    @include('layouts.partials.head')
    @yield('content')
    <div style="position: absolute; z-index: -1">
        <form id="sepet-kaldir" action="{{ route('sepet.kaldir') }}" method="post">
            {{ csrf_field() }}
            <input id="sepetten_kaldir_id" type="hidden" name="rowID" value="">
            <input id="sepetten_kaldir_submit" type="submit">
        </form>

        <form id="sepet-guncelle" action="{{ route('sepet.guncelle') }}" method="post">
            {{ csrf_field() }}
            <input id="guncelle-id" type="hidden" name="rowId" value="">
            <input id="guncelle-size" type="hidden" name="size" value="">
            <input id="guncelle-adet" type="hidden" name="adet" value="">
            <input id="guncelle-renk" type="hidden" name="renk" value="">
            <input id="sepet-guncelle-submit" type="submit">
        </form>
    </div>
    @include('layouts.partials.footer')
    <!-- jQuery Plugins -->
    <script src="{{ config('app.url') }}js/jquery.min.js"></script>
    <script src="{{ config('app.url') }}js/bootstrap.min.js"></script>
    <script src="{{ config('app.url') }}js/slick.min.js"></script>
    <script src="{{ config('app.url') }}js/nouislider.min.js"></script>
    <script src="{{ config('app.url') }}js/jquery.zoom.min.js"></script>
    <script src="{{ config('app.url') }}js/main.js"></script>
    <script src="{{ config('app.url') }}js/alertMain.js"></script>
    <script>
        /*var height = $(window).height();
        var menu_height = $('.custom-menu').height();
        alert(menu_height);
        $('#shopping-cart').css({
            'overflow-y': 'scroll',
            'height': height - 150 + 'px',
            'overflow-x': 'hidden'
        });*/
        $(window).scroll(function(){
            var slenght = $(this).scrollTop();
            if ( slenght <= 60 ){
                $('#header').removeClass('fixed-bar');
            }else {
                $('#header').addClass('fixed-bar');
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.add-to-cart').on('click', function (e) {
            e.preventDefault();
            var IDS = $(this).attr('id');
            ID = IDS.split('_');
            ID = ID[1];
            $.ajax({
                type: 'POST',
                url: '{{ config('app.url') }}sepet/ekle',
                data: {
                    ID: ID
                },
                success: function (data) {
                    console.log(data);
                    $('#'+IDS).css({'background-color': '#43a269'}).html(
                        '<i class="fa fa-shopping-cart"></i> Eklendi'
                    );
                    $('#alerts').stop().show().find('.alert').remove();
                    $('#alerts').html('<div class="alert alert-'+ data['mesaj_tur'] +'">'+ data['mesaj'] +'</div>');
                    setTimeout(function(){
                        $('#alerts').hide();
                        $('#'+IDS).css({'background-color': '#F8694A'}).html(
                            '<i class="fa fa-shopping-cart"></i> Sepet ekle'
                        );
                    }, 1500);
                    $('#qty').html(data['urun_sayisi']);
                    $('#cart-sub-total').html(data['toplam']);
                    $('#cart-buttons:hidden').show();
                    $('#carts-h3:visible').hide();
                    $('#shopping-cart > section#new-add-carts').find('#' + data['sepet']['rowId']).remove();
                    $('#shopping-cart > section#new-add-carts').append(
                        '<div id="'+ data['sepet']['rowId'] +'" class="shopping-cart-list">' +
                            '<div class="product product-widget">' +
                                '<div class="product-thumb">' +
                                    '<img src="'+ data['sepet']['options']['url'] + 'img/' + data['sepet']['options']['img'] +'" alt="">' +
                                '</div>' +
                                    '<div class="product-body">' +
                                    '<h3><del class="product-old-price"><i class="fa fa-try" aria-hidden="true"></i>'+ data['sepet']['options']['eski_fiyati'] +'</del></h3>' +
                                    '<h2 class="product-price"><i class="fa fa-try" aria-hidden="true"></i>'+ data['sepet']['price'] +' <span class="qty_extended qty">X</span> <span class="new_qty">'+ data['sepet']['qty'] +'</span></h2>' +
                                    '<h3 class="product-name"><a href="'+ data['sepet']['options']['url'] + 'urun/' + data['sepet']['options']['link'] +'">'+ data['sepet']['name'] +'</a></h3>' +
                                '</div>' +
                            '<a id="sepet_'+ data['sepet']['rowId'] +'" class="cart-empty cancel-btn"><i class="fa fa-trash"></i></a>' +
                            '</div>' +
                        '</div>'
                    );
                },
                error: function (data) {
                    console.log('Hata', data);
                }
            });
        });

        $('.cart-empty').on('click', function () {
            var ID = $(this).attr('id').split('_');
            ID = ID[1];
            $('#sepetten_kaldir_id').val('').val(ID);
            $('#sepetten_kaldir_submit').trigger('click');
            return false;
        });

        $('.size').on('change', function () {
            ID = $(this).attr('ID').split('_');
            $('#guncelle-id').val(ID[1]);
            var size = $(this).find('option:selected').val();
            $('#guncelle-size').val(size);
            $('#sepet-guncelle-submit').trigger('click');
            return false;
        });

        $('.renk').on('change', function () {
            ID = $(this).attr('ID').split('_');
            $('#guncelle-id').val(ID[1]);
            var renk = $(this).find('option:selected').val();
            $('#guncelle-renk').val(renk);
            $('#sepet-guncelle-submit').trigger('click');
            return false;
        });

        $('.adet').on('change', function () {
            ID = $(this).attr('ID').split('_');
            $('#guncelle-id').val(ID[1]);
            var adet = $(this).val();
            $('#guncelle-adet').val(adet);
            $('#sepet-guncelle-submit').trigger('click');
            return false;
        });
    </script>
    @yield('javascript')
</body>
</html>