@extends('front.design')

@section('title')
    Notice Detail
@endsection

@section('content')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="container">
        <h2>Notice Detail</h2>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-8">
                <h3>{{$notice->title}}</h3>
                <p>
                    {!!$notice->description!!}
                </p>

            </div>
            <div class="col-lg-4">

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Uploaded</h5>
                    <p>{{$notice->created_at->diffForHumans()}}</p>

                </div>
                @if (!empty($notice->image))
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{route('display.notice', $notice->image)}}" target="_blank" class="btn btn-primary">View Full Notice</a>
                        <a href="{{route('download.notice', $notice->image)}}" target="_blank" class="btn btn-info">Download Notice</a>
                    </div>
                @endif

            </div>
        </div>

    </div>
</section>
<!-- End Cource Details Section -->
@endsection
