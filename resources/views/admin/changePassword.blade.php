@extends('admin.includes.admin_design')

@section('title')
    Admin Password - ProjectInsightsNP
@endsection
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Change Password</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            @include('admin.includes._message')


            <form method="post" action="{{ route('updatePassword', $admin->id) }}">
                @csrf
                <div class="form-group">
                    <label>Old password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="current_password"
                           placeholder="Enter Current Password" name="current_password" >
                    <p id="correct_password">
                    </p>
                </div>
                <div class="form-group">
                    <label>New password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="pass_confirmation"
                           placeholder="Enter New Password" name="password">
                </div>
                <div class="form-group">
                    <label>Confirm password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="pass"
                           placeholder="Confirm Password" name="pass_confirmation" >
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn" type="submit">Update Password</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection
