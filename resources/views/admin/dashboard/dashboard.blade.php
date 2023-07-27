@extends('admin.includes.admin_design')

@section('title')
    Admin Dashboard - ProjectInsightsNP
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome Admin!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-file-pdf-o"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{count($thesis)}}</h3>
                            <span>Thesis</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-edit"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{count($blogs)}}</h3>
                            <span>Blogs</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-bullhorn"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{count($notices)}}</h3>
                            <span>Notices</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-briefcase"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{count($news)}}</h3>
                            <span>News</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection
