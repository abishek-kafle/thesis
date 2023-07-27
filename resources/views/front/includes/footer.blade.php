<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                @php
                    $theme = \App\Models\Theme::orderBy('id', 'desc')->first();
                @endphp
                <img src="{{asset('uploads/themes/'.$theme->logo)}}" style="width: 50px;"> &copy; Copyright <strong><span>ProjectInsights</span></strong>. All Rights Reserved
            </div>
            {{-- <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div> --}}
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            @php
                $social_media = \App\Models\Socialmedia::orderBy('id', 'desc')->first();
            @endphp
            @if (!empty($social_media->facebook))
            <a href="{{$social_media->facebook}}" class="facebook"><i class="bx bxl-facebook"></i></a>
            @endif
            @if (!empty($social_media->youtube))
            <a href="{{$social_media->youtube}}" class="youtube"><i class="bx bxl-youtube"></i></a>
            @endif
            @if (!empty($social_media->twitter))
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            @endif
            @if (!empty($social_media->instagram))
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            @endif
            @if (!empty($social_media->linkedin))
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            @endif
        </div>
    </div>
</footer>
<!-- End Footer -->
