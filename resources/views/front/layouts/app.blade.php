@include('front.partials.header')

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
	@include('front.partials.menu')

		<!-- Page Title
		============================================= -->
            @yield('content')
		<!-- Footer
		============================================= -->
	@include('front.partials.footer')
	</div><!-- #wrapper end -->

@include('front.partials.bottom')
