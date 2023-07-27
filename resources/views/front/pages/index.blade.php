@extends('front.design')

@section('title')
    {{config('app.name')}} - Index
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>{{$info->title}}</h1>
      <h2>{{$info->description}}</h2>
    </div>
</section>
<!-- End Hero -->

<!-- ======= Blogs Section ======= -->
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <div class="row">
                <div class="col-md-10">
                    <h2>Recent Blogs</h2>
                    <p>Blogs Section</p>
                </div>
                <div class="col-md-2">
                    <a href="{{route('front.blog')}}" class="btn btn-info">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="course-item">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{asset('uploads/blogs/'.$blog->image)}}" style="width: 300px;" class="testimonial-img" alt="">
                            </div>
                            <div class="col-md-12">
                                <div class="course-content">
                                    <h3><a href="{{route('front.blog_detail', $blog->slug)}}">{{$blog->title}}</a></h3>
                                    <p><i>Uploaded : {{$blog->created_at->diffForHumans()}}</i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Testimonials Section -->


<!-- ======= Recent Notice Section ======= -->
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <div class="row">
                <div class="col-md-10">
                    <h2>Recent Notices</h2>
                    <p>Notices</p>
                </div>
                <div class="col-md-2">
                    <a href="{{route('front.notice')}}" class="btn btn-info">View All</a>
                </div>
            </div>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @foreach($notices as $notice)
                <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                    <div class="course-item">
                        <div class="course-content">
                            <h3><a href="{{route('front.notice_detail',$notice->slug)}}">{{$notice->title}}</a></h3>
                            <p><i>Uploaded : {{$notice->created_at->diffForHumans()}}</i></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
<!-- ====== End Popular Courses Section ======= -->

<!-- ======= News Section ======= -->
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <div class="row">
                <div class="col-md-10">
                    <h2>Recent News</h2>
                    <p>News Section</p>
                </div>
                <div class="col-md-2">
                    <a href="{{route('front.news')}}" class="btn btn-info">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($news as $item)
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
            @endforeach
        </div>

    </div>
</section>
<!-- End Testimonials Section -->

@endsection
