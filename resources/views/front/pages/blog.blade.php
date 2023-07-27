@extends('front.design')

@section('title')
    {{config('app.name')}} - Blogs
@endsection

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>All Blogs</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blogs Section ======= -->
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="{{asset('uploads/blogs/'.$blog->image)}}" style="min-width: 300px; max-width:300px;" class="testimonial-img" alt="">
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

@endsection
