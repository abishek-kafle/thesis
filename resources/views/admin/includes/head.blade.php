<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" {{ csrf_token() }}>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/dataTables.bootstrap4.min.css')}}">

    <!-- Sweetalert CSS-->
    <link rel="stylesheet" href="{{asset('admin/css/sweetalert.css')}}">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/line-awesome.min.css')}}">

    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{asset('admin/plugins/morris/morris.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
