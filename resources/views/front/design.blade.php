<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>@yield('title')</title>
        <meta name="google-site-verification" content="9LKAoVuv6j1q67vhJMWDFSHpblX8B9RDb60aB_qCk2U" />
        <meta content="Projectinsightsnp guides you with your work related to thesis and proposal for bbs,mbs. Here we provide you thesis and proposal sample references for bbs, mbs." name="description">
        <meta content="Projectinsightsnp, Projectinsights, Project Insights, Thesis examples, BBS, MBS, Thesis, project work report, research, TU, PU, KU, HSEB, CTEVT" name="keywords">
        <meta content="Projectinsightsnp" name="author">

        @include('front.includes.head')
    </head>

    <body>

        @include('front.includes.navbar')

        <main id="main">

            @yield('content')

        </main><!-- End #main -->

        @include('front.includes.footer')

        <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
        <div id="preloader"></div>

        @include('front.includes.scripts')

    </body>

</html>
