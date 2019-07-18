<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="{{ config('app.url').'admin/' }}assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url').'admin/' }}assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url').'admin/' }}assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url').'admin/' }}assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url').'admin/' }}assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url').'admin/' }}assets/css/new.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    @yield('styles')

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    @yield('javascript')

</head>

<body>

<div id="alerts" class="container">
    <div class="alert alert-{{ session('mesaj_tur') }}">{{ session('mesaj') }}</div>
</div>

<!-- Main navbar -->
@include('yonetim.layouts.partials.navbar')
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        @include('yonetim.layouts.partials.sidebar')
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            @yield('pagehead')

            <!-- Content area -->
            <div class="content">

                <!-- new content -->
                @yield('content')
                <!-- /new content -->

                <!-- ajax -->
                @yield('ajax')
                <!-- ajax -->


                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; 2018. <a href="#">Tüm hakları saklıdır</a> sorunlarınızla ilgili <a href="http://metamedya.com" target="_blank">iletişime</a> geçebilirsiniz.
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

<script>
    function ToSeoUrl(textString) {

        textString = textString.replace(/ /g, "-");
        textString = textString.replace(/</g, "");
        textString = textString.replace(/>/g, "");
        textString = textString.replace(/"/g, "");
        textString = textString.replace(/é/g, "");
        textString = textString.replace(/!/g, "");
        textString = textString.replace(/'/, "");
        textString = textString.replace(/£/, "");
        textString = textString.replace(/^/, "");
        textString = textString.replace(/#/, "");
        textString = textString.replace(/$/, "");
        textString = textString.replace(/\+/g, "");
        textString = textString.replace(/%/g, "");
        textString = textString.replace(/½/g, "");
        textString = textString.replace(/&/g, "");
        textString = textString.replace(/\//g, "");
        textString = textString.replace(/{/g, "");
        textString = textString.replace(/\(/g, "");
        textString = textString.replace(/\[/g, "");
        textString = textString.replace(/\)/g, "");
        textString = textString.replace(/]/g, "");
        textString = textString.replace(/=/g, "");
        textString = textString.replace(/}/g, "");
        textString = textString.replace(/\?/g, "");
        textString = textString.replace(/\*/g, "");
        textString = textString.replace(/@/g, "");
        textString = textString.replace(/€/g, "");
        textString = textString.replace(/~/g, "");
        textString = textString.replace(/æ/g, "");
        textString = textString.replace(/ß/g, "");
        textString = textString.replace(/;/g, "");
        textString = textString.replace(/,/g, "");
        textString = textString.replace(/`/g, "");
        textString = textString.replace(/|/g, "");
        textString = textString.replace(/\./g, "");
        textString = textString.replace(/:/g, "");
        textString = textString.replace(/İ/g, "i");
        textString = textString.replace(/I/g, "i");
        textString = textString.replace(/ı/g, "i");
        textString = textString.replace(/ğ/g, "g");
        textString = textString.replace(/Ğ/g, "g");
        textString = textString.replace(/ü/g, "u");
        textString = textString.replace(/Ü/g, "u");
        textString = textString.replace(/ş/g, "s");
        textString = textString.replace(/Ş/g, "s");
        textString = textString.replace(/ö/g, "o");
        textString = textString.replace(/Ö/g, "o");
        textString = textString.replace(/ç/g, "c");
        textString = textString.replace(/Ç/g, "c");
        textString = textString.replace(/--/g, "-");
        textString = textString.replace(/---/g, "-");
        textString = textString.replace(/----/g, "-");
        textString = textString.replace(/----/g, "-");

        return textString.toLowerCase();
    }
</script>
@yield('js')

</body>
</html>
