<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:12 GMT -->
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin - Foodie Guy</title>
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

</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="{{URl::to('/admin/home')}}"><span>Admin Panel</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<!-- start: User Dropdown -->
						
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<h3 style="color:blue;">
									<?php
										$user_name = Session::get('user_name');
										echo($user_name);
									?>
								</h3> 
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{URl::to('/admin/logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="{{URl::to('/admin/home')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Dashboard</span></a></li>
                        <li><a href="{{URl::to('/admin/categories')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Categories</span></a></li>
                        <li><a href="{{URl::to('/admin/users')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Users</span></a></li>
                        <li><a href="{{URl::to('/admin/reviews')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">Reviews</span></a></li>	
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Item</span><span class="label label-important"></span></a>
							<ul>
								<li><a class="submenu" href="{{URl::to('/admin/allitems')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">All Items</span></a></li>
								<li><a class="submenu" href="{{URl::to('/admin/publisheditems')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Published Items</span></a></li>
								<li><a class="submenu" href="{{URl::to('/admin/draftitems')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Draft Items</span></a></li>
								<li><a class="submenu" href="{{URl::to('/admin/additem')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Item</span></a></li>
							</ul>	
                        </li>
                        <li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Order</span><span class="label label-important"></span></a>
							<ul>
								<li><a class="submenu" href="{{URl::to('/admin/allorders')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">All Orders</span></a></li>
                                <li><a class="submenu" href="{{URl::to('/admin/servedorders')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Served Orders</span></a></li>
                                <li><a class="submenu" href="{{URl::to('/admin/unservedorders')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Unserved Orders</span></a></li>
							</ul>	
                        </li>
                        <li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Admin</span><span class="label label-important"></span></a>
							<ul>
								<li><a class="submenu" href="{{URl::to('/admin/alladmins')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">All Admins</span></a></li>
								<li><a class="submenu" href="{{URl::to('/admin/addadmin')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Admin</span></a></li>
							</ul>	
                        </li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>
            @yield('content')
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span class="hidden-phone" style="text-align:right;float:right">Copyroght  &copy Imran Hosen</span>
		</p>

	</footer>
	
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
