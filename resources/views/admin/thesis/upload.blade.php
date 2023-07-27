@extends('admin.includes.admin_design')

@section('title') Add Files - {{ config('app.name', 'Laravel') }} @endsection


@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Upload Files</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add PDF</li>
                    </ul>
                </div>

                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('thesis.index') }}" class="btn add-btn" ><i class="fa fa-eye"></i> View All Thesis</a>
                </div>
            </div>
        </div>

        @include('admin.includes._message')
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <form action="{{route('thesis.file.store', $thesis->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sub_category">Sub Category</label>
                                        <select name="sub_category" id="sub_category" class="form-control">
                                            <option value="proposal">Proposal</option>
                                            <option value="thesis">Thesis</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="file">Upload Files</label>
                                        <input type="file" class="form-control" name="file[]" id="file" multiple>
                                    </div>
                                </div>

                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Upload Thesis</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">

                    <div class="card-body">
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
                                                            <a href="{{route('thesis.file.view', $proposal->file)}}" target="_blank" class="btn btn-info btn-sm"><i class="la la-eye"></i>View</a>
                                                            <a href="javascript:" class="btn btn-danger btn-sm deleteRecord" rel="{{ $proposal->id }}" rel1="thesis/file/delete">
                                                                <i class="la la-trash"></i> Delete
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
                                                            <a href="{{route('thesis.file.view', $thesis->file)}}" target="_blank" class="btn btn-info btn-sm"><i class="la la-eye"></i>View</a>
                                                            <a href="javascript:" class="btn btn-danger btn-sm deleteRecord" rel="{{ $thesis->id }}" rel1="thesis/file/delete">
                                                                <i class="la la-trash"></i> Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('js')
    <script>
        $('body').on('click', '.deleteRecord', function (event) {
            event.preventDefault();
            var SITEURL = '{{ URL::to('') }}';
            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            swal({
                title: "Are You Sure? ",
                text: "You will not be able to recover this record again",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, Delete it!"
            },
            function () {
                window.location.href =  SITEURL + "/admin/" + deleteFunction + "/" + id;
            });
        });
    </script>
@endsection


