@extends('front.design')

@section('title')
    {{config('app.name')}} - Thesis
@endsection

@section('content')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="container">
        <h2>All Thesis</h2>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- ======= Events Section ======= -->
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
        <div class="row">
            @foreach ($thesis as $item)
                <div class="container">
                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{asset('uploads/extras/PDF_file_icon.png')}}" style="width: 150px;" class="pdf-img" alt="">
                                </div>
                                <div class="col-md-7">
                                    <div class="course-content">
                                        <h3><a href="{{route('front.thesis_detail',$item->slug)}}">{{$item->title}}</a></h3>
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
