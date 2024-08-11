<!--====== Required meta tags ======-->
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="{{ web_settings('web', 'website_keywords') }}"/>
<meta name="description" content="{{ web_settings('web', 'website_description') }}"/>
<!--====== Title ======-->
<title>@yield('title')</title>
<!--====== Favicon Icon ======-->
<link rel="shortcut icon" href="{{URL::to('/')}}/templates/landing-page/assets/images/favicon.ico" type="image/png">
<!--====== FontAwesome css ======-->
<link rel="stylesheet" href="{{URL::to('/')}}/templates/landing-page/assets/fonts/fontawesome/css/all.min.css">
<!--====== FontAwesome css ======-->
<link rel="stylesheet" href="{{URL::to('/')}}/templates/landing-page/assets/fonts/flaticon/flaticon.css">
<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="{{URL::to('/')}}/templates/landing-page/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--====== magnific-popup css ======-->
<link rel="stylesheet" href="{{URL::to('/')}}/templates/landing-page/assets/vendor/magnific-popup/dist/magnific-popup.css">
<!--====== Slick-popup css ======-->
<link rel="stylesheet" href="{{URL::to('/')}}/templates/landing-page/assets/vendor/slick/slick.css">
<!--====== Sal Animate css ======-->
<link rel="stylesheet" href="{{URL::to('/')}}/templates/landing-page/assets/vesndor/aos/aos.css">
<!--====== Default css ======-->
<link rel="stylesheet" href="{{URL::to('/')}}/templates/landing-page/assets/css/default.css">
<!--====== Style css ======-->
<link rel="stylesheet" href="{{URL::to('/')}}/templates/landing-page/assets/css/style.css">
<!--====== Responsive css ======-->
<link rel="stylesheet" href="{{URL::to('/')}}/templates/landing-page/assets/css/responsive.css">
<!--====== Magnific popup css ======-->
<link rel="stylesheet" href="{{URL::to('/')}}/templates/landing-page/assets/vendor/magnific-popup/dist/magnific-popup.css">
@yield("css")