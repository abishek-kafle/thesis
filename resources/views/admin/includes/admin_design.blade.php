<!DOCTYPE html>
<html lang="en">
    @include('admin.includes.head')
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">

			@include('admin.includes.header')

            @include('admin.includes.sidebar')

			<!-- Page Wrapper -->
            <div class="page-wrapper">

				@yield('content')

            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		@include('admin.includes.footer')

    </body>
</html>
