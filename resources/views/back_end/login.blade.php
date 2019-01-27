<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:12 GMT -->
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin - My Planet</title>
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->

	<link id="bootstrap-style" href="{{URL::asset('back_end/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('back_end/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{URL::asset('back_end/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{URL::asset('back_end/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->

	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url(img/bg-login.jpg) !important; }
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					
					<h2>Login to your account</h2>
                    <h3 style="color:red">
						<?php
							 $login_failed = Session::get('login_failed');
							 $login_first = Session::get('login_first');
							 if($login_failed){
								 echo($login_failed);
								 Session::put('login_failed',null);
							 }
							 if($login_first){
								echo($login_first);
								Session::put('login_first',null);
							}
						?>
					</h3>
					<form class="form-horizontal" action="{{url('/admin/checkadmin')}}" method="post">
                    	{{csrf_field()}}
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="email" id="username" type="text" placeholder="type email"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
							</div>
							<div class="clearfix"></div>
							<div class="button-login">	
								<button type="submit" class="btn btn-primary" name = "login">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
						
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	
	<!-- start: JavaScript-->

    <script src="{{URL::asset('back_end/js/jquery-1.9.1.min.js')}}"></script>
		<script src="{{URL::asset('back_end/js/jquery-migrate-1.0.0.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.ui.touch-punch.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/modernizr.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/bootstrap.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.cookie.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/fullcalendar.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.dataTables.min.js')}}"></script>

		<script src="{{URL::asset('back_end/js/excanvas.js')}}"></script>
		<script src="{{URL::asset('back_end/js/jquery.flot.js')}}"></script>
		<script src="{{URL::asset('back_end/js/jquery.flot.pie.js')}}"></script>
		<script src="{{URL::asset('back_end/js/jquery.flot.stack.js')}}"></script>
		<script src="{{URL::asset('back_end/js/jquery.flot.resize.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.chosen.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.uniform.min.js')}}"></script>
		
		<script src="{{URL::asset('back_end/js/jquery.cleditor.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.noty.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.elfinder.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.raty.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.iphone.toggle.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.uploadify-3.1.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.gritter.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.imagesloaded.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.masonry.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.knob.modified.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/jquery.sparkline.min.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/counter.js')}}"></script>
	
		<script src="{{URL::asset('back_end/js/retina.js')}}"></script>

		<script src="{{URL::asset('back_end/js/custom.js')}}"></script>
	<!-- end: JavaScript-->
	
</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:47 GMT -->
</html>
