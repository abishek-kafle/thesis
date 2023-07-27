@extends('admin.includes.admin_design')

@section('title') Theme Section  - {{ config('app.name', 'Laravel') }} @endsection


@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Theme Section</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Theme</li>
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
                        <form action="{{route('theme.update', $theme->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="website_name">Website Name</label>
                                        <input type="text" class="form-control" name="website_name" id="website_name" value="{{$theme->website_name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" class="form-control" name="logo" id="logo" accept="image/*" onchange="readURL(this)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img src="{{ asset('uploads/themes/'.$theme->logo) }}" alt="" width="150" id="one">
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Update Theme</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('js')
    <script>
         function readURL(input){
             if(input.files && input.files[0]){
                 var reader = new FileReader();
                 reader.onload = function (e){
                     $("#one").attr('src', e.target.result).width(150)
                 };
                 reader.readAsDataURL(input.files[0]);
             }
         }
    </script>
@endsection
