<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name').' /Admin Girişi' }}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="{{ config('app.url').'admin/' }}assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url').'admin/' }}assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url').'admin/' }}assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url').'admin/' }}assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="{{ config('app.url').'admin/' }}assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/core/app.js"></script>
    <script type="text/javascript" src="{{ config('app.url').'admin/' }}assets/js/pages/login.js"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container login-cover">

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content pb-20">

                <!-- Tabbed form -->
                <div class="tabbable panel login-form width-400">

                    <div class="tab-content panel-body">
                        <div class="tab-pane fade in active" id="basic-tab1">
                            <form action="{{ route('yonetim.oturumac') }}" method="post" class="form-validate">

                                {{ csrf_field() }}
                                <div class="form-group has-feedback has-feedback-left">
                                    <input type="text" class="form-control" placeholder="Kullanıcı Adınız" name="email" required="required">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                    @if($errors->has('email'))
                                        <label id="username-error" class="validation-error-label" for="username">{{ $errors->first('email') }}</label>
                                    @endif
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <input type="password" class="form-control" placeholder="Şifreniz" name="sifre" required="required">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group login-options">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="checkbox-inline">
                                                <input name="benihatirla" type="checkbox" class="styled" checked="checked">
                                                Beni Hatırla
                                            </label>
                                        </div>

                                        <div class="col-sm-6 text-right">
                                            <a href="">Şifre mi unuttum?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn bg-blue btn-block">Giriş <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </form>

                            <div class="content-divider text-muted form-group"><span>veya aşağadakilerden giriş yapın!</span></div>
                            <ul class="list-inline form-group list-inline-condensed text-center">
                                <li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>
                                <li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-dribbble3"></i></a></li>
                                <li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>
                                <li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>
                            </ul>

                            <span class="help-block text-center no-margin">Tüm hakları saklıdır. İletişim için <a href="http://metamedya.com/">www.metamedya.com</a> adresini ziyaret ediniz.</span>
                        </div>
                    </div>
                </div>
                <!-- /tabbed form -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
