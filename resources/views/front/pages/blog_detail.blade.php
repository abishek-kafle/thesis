@extends('front.design')

@section('title')
    Blog Detail
@endsection

@section('content')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="container">
        <h2>Blog Detail</h2>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-8">
                <img src="{{asset('uploads/blogs/'.$blog->image)}}" style="width: 320px;" alt="news-image">
                <h3>{{$blog->title}}</h3>
                <p>
                    {!!$blog->description!!}
                </p>

            </div>
            <div class="col-lg-4">

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Uploaded</h5>
                    <p>{{$blog->created_at->diffForHumans()}}</p>

                </div>


            </div>
        </div>

    </div>
</section>
<!-- End Cource Details Section -->
@endsection
