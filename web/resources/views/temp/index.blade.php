<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2022 14:37:32 GMT -->
<head>
    @include('temp.header')
</head>

<body>

	<!-- Main navbar -->
	@include('temp.navbar')
	<!-- /main navbar -->
	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		@include('temp.sidebar')
		<!-- /main sidebar -->
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Inner content -->
			<div class="content-inner">
				<!-- Page header -->
				@include('temp.page-header')
				<!-- /page header -->
				<!-- Content area -->
				@yield('content')
                @include('temp.footer')
			</div>
		</div>
	</div>
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2022 14:41:49 GMT -->
</html>
