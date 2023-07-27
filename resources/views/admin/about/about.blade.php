@extends('admin.includes.admin_design')

@section('title') About - {{ config('app.name', 'Laravel') }} @endsection


@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">About Section</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">About Section</li>
                    </ul>
                </div>

            </div>
        </div>

        @include('admin.includes._message')
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <form action="{{route('about.update',$about->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="8" class="form-control">{{$about->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" name="image" id="image" accept="image/*" onchange="readURL(this)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img src="{{ asset('uploads/abouts/'.$about->image) }}" alt="" width="150" id="one">
                                    </div>
                                </div>

                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Update About</button>
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
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
