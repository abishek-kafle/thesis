@extends('front.design')

@section('title')
    {{config('app.name')}} - News
@endsection

@section('content')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="container">
        <h2>All News</h2>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- ======= Events Section ======= -->
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
        <div class="row">
            @foreach ($news as $item)
                <div class="container">
                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset('uploads/news/'.$item->image)}}" style="width: 180px;" class="testimonial-img" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="course-content">
                                        <h3><a href="{{route('front.news_detail',$item->slug)}}">{{$item->title}}</a></h3>
                                        <p><i>Uploaded : {{$item->created_at->diffForHumans()}}</i></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Events Section -->
@endsection
