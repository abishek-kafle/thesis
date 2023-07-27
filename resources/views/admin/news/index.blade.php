@extends('admin.includes.admin_design')

@section('title') All News - {{ config('app.name', 'Laravel') }} @endsection


@section('content')

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">View All News</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All News</li>
                    </ul>
                </div>

                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('news.add') }}" class="btn add-btn" ><i class="fa fa-plus"></i> Add News</a>
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
                                        @foreach($news as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td><img src="{{asset('uploads/news/'.$item->image)}}" style="width: 100px;" alt="news-image"></td>
                                        <td>
                                            @if($item->status == 1)
                                                <p><a href="#" class="text-success">Active</a></p>
                                            @else
                                                <p><a href="#" class="text-danger">In Active</a></p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('news.edit', $item->id ) }}" class="btn btn-info btn-sm">
                                                <i class="la la-edit"></i> Edit
                                            </a>

                                            <a href="javascript:" class="btn btn-danger btn-sm deleteRecord" rel="{{ $item->id }}" rel1="news/delete">
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
