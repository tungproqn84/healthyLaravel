<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel </title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../layout/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="../layout/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="../layout/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="../layout/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="../layout/assets/dest/css/style.css">
	<link rel="stylesheet" href="../layout/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="../layout/assets/dest/css/huong-style.css">
	{{-- <script type="text/javascript" src="https://itexpress.vn/js/noel.js"></script> --}}
</head>
<body>

	@include('header')
	<div class="rev-slider">
	@yield('content')
	</div> <!-- .container -->

	@include('footer')


	<!-- include js files -->
	<script src="../layout/assets/dest/js/jquery.js"></script>
	<script src="../layout/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="../layout/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="../layout/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="../layout/assets/dest/vendors/animo/Animo.js"></script>
	<script src="../layout/assets/dest/vendors/dug/dug.js"></script>
	<script src="../layout/assets/dest/js/scripts.min.js"></script>
	<script src="../layout/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="../layout/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="../layout/assets/dest/js/waypoints.min.js"></script>
	<script src="../layout/assets/dest/js/wow.min.js"></script>
	<script src="/ckeditor/ckeditor.js"></script>
	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<!--customjs-->
	<script src="../layout/assets/dest/js/custom2.js"></script>
	{{-- <script>
	$(document).ready(function($) {
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script> --}}
</body>
</html>
