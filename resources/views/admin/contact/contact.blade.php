@extends('admin.includes.admin_design')

@section('title') Contact Section  - {{ config('app.name', 'Laravel') }} @endsection


@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Contact Section</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
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
                        <form action="{{route('contact.update', $contact->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{$contact->email}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{$contact->phone}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" value="{{$contact->address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Update Contact</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
