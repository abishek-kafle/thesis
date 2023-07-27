@extends('front.design')

@section('title')
    {{config('app.name')}} - Notices
@endsection

@section('content')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="container">
        <h2>All Notices</h2>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- ======= Events Section ======= -->
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
        <div class="row">

            @foreach ($notices as $notice)
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
<!-- End Events Section -->
@endsection
