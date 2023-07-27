@extends('front.design')

@section('title')
    {{config('app.name')}} - Privacy Policy
@endsection

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>About Us</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-4 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                  <img src="{{asset("uploads/abouts/".$about->image)}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>{{$about->title}}</h3>
                    <p>{!! $about->description !!}</p>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

@endsection
