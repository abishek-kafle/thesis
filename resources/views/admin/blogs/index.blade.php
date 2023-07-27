@extends('admin.includes.admin_design')

@section('title') All Blogs - {{ config('app.name', 'Laravel') }} @endsection


@section('content')

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">View All Blogs</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Blogs</li>
                    </ul>
                </div>

                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('blog.add') }}" class="btn add-btn" ><i class="fa fa-plus"></i> Add Blog</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        @include('admin.includes._message')
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="datatable table table-stripped mb-0">
                                <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                    <tbody>
                                        @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->id }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td><img src="{{asset('uploads/blogs/'.$blog->image)}}" style="width: 100px;" alt="blog-image"></td>
                                        <td>
                                            @if($blog->status == 1)
                                                <p><a href="#" class="text-success">Active</a></p>
                                            @else
                                                <p><a href="#" class="text-danger">In Active</a></p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('blog.edit', $blog->id ) }}" class="btn btn-info btn-sm">
                                                <i class="la la-edit"></i> Edit
                                            </a>

                                            <a href="javascript:" class="btn btn-danger btn-sm deleteRecord" rel="{{ $blog->id }}" rel1="blog/delete">
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
