@extends('admin.includes.admin_design')

@section('title') Social Media  - {{ config('app.name', 'Laravel') }} @endsection


@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Socialmedia Section</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Socialmedia</li>
                    </ul>
                </div>
            </div>
        </div>

        @include('admin.includes._message')
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">

                    <div class="card-body">
                        <form action="{{route('socialmedia.update', $socialmedia->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" name="facebook" id="facebook" value="{{$socialmedia->facebook}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="youtube">Youtube</label>
                                        <input type="text" class="form-control" name="youtube" id="youtube" value="{{$socialmedia->youtube}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control" name="twitter" id="twitter" value="{{$socialmedia->twitter}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" name="instagram" id="instagram" value="{{$socialmedia->instagram}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="linkedin">LinkedIn</label>
                                        <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{$socialmedia->linkedin}}">
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Update Socialmedia</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
