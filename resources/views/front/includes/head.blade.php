<!-- Favicons -->
@php
    $theme = \App\Models\Theme::orderBy('id', 'desc')->first();
@endphp
<link href="{{asset('uploads/themes/'.$theme->logo)}}" rel="icon">
<link href="{{asset('front/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('front/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
<link href="{{asset('front/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
<link href="{{asset('front/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
<link href="{{asset('front/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{asset('front/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
<link href="{{asset('front/vendor/aos/aos.css')}}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{asset("front/css/style.css")}}" rel="stylesheet">
