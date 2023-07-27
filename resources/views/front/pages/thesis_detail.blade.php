@extends('front.design')

@section('title')
{{config('app.name')}} - Thesis Detail
@endsection

@section('content')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="container">
        <h2>Thesis Description</h2>
    </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-8">
                <img src="{{asset('uploads/extras/PDF_file_icon.png')}}" style="width: 200px;" class="img-fluid" alt="">
                <h3>{{$thesis->title}}</h3>
                <p>
                    {!!$thesis->description!!}
                </p>
            </div>
            <div class="col-lg-4">

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Category</h5>
                    <p>{{$thesis->category->title}}</p>
                </div>


                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Uploaded</h5>
                    <p>{{$thesis->created_at->diffForHumans()}}</p>
                </div>

            </div>
        </div>
        <div class="row">

            <div class="col-md-6 text-center">
                Proposals
                <div>
                    <table class="table table-stripped mb-0">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                            <tbody>
                                @foreach($proposal_files as $proposal)
                                    <tr>
                                        <td>{{ $proposal->file }}</td>
                                        <td>
                                            <a href="{{route('display.file', $proposal->file)}}" target="_blank" class="btn btn-info btn-sm"><i class="la la-eye"></i>View</a>
                                            <a href="{{route('download.file', $proposal->file)}}" target="_blank" class="btn btn-primary btn-sm">
                                                <i class="la la-arrow_down"></i> Download
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6 text-center">
                Thesis
                <div>
                    <table class="table table-stripped mb-0">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                            <tbody>
                                @foreach($thesis_files as $thesis)
                                    <tr>
                                        <td>{{ $thesis->file }}</td>
                                        <td>
                                            <a href="{{route('display.file', $thesis->file)}}" target="_blank" class="btn btn-info btn-sm">View</a>
                                            <a href="{{route('download.file', $thesis->file)}}" target="_blank" class="btn btn-primary btn-sm">Download</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- End Cource Details Section -->
@endsection
