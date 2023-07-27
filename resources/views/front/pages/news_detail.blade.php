@extends('front.design')

@section('title')
    News Detail
@endsection

@section('content')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="container">
        <h2>News Detail</h2>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-8">
                <img src="{{asset('uploads/news/'.$news->image)}}" style="width: 320px;" alt="news-image">
                <h3>{{$news->title}}</h3>
                <p>
                    {!!$news->description!!}
                </p>

            </div>
            <div class="col-lg-4">

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Uploaded</h5>
                    <p>{{$news->created_at->diffForHumans()}}</p>

                </div>


            </div>
        </div>

    </div>
</section>
<!-- End Cource Details Section -->
@endsection
