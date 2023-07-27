@extends('front.design')

@section('title')
    {{config('app.name')}} - Privacy Policy
@endsection

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Privacy Policy</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <p>{!! $policy->description !!}</p>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

@endsection
