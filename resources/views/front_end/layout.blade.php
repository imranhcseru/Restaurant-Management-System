<!DOCTYPE html>
<html>
<head>
	<title>Foodie-Guy</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('front_end/css/style.css')}}">
	<script type="text/javascript"></script>
</head>
<body>
	<header>
		<nav>
			<ul class="left">
				<li><a href="{{url('/')}}">Home</a></li>
				<li><a href="{{('/cuisines')}}">Cuisines</a></li>	
				<li><a href="{{('/newrecipies')}}">New Recipies</a></li>	
			</ul>
			<ul class="right">
				<?php
					$user_name = Session::get('user_name');
					if($user_name){
						echo "<li><h3 style='color:blue;'>".$user_name."</h3></li>";
				?>
					<li class="logout"><a href = "{{url('/logout')}}">Log Out</a></li>
				<?php
					}
					else{
				?>		
				<li><a href = "{{url('/login')}}">Log In</a></li>
				<li><a href="{{url('/register')}}">Register</a></li>
					<?php }?>
			</ul>
		</nav>
	</header>
		@yield('content')
	<footer>
		<div class="foot_container">
			<div class = "top">
					<div class="column">
						<div>
							<nav>
								
								<ul>
									<li><h2 class="column_head">Discover</h2></li>
									<li class="footer_li"><a href="index.html">Home</a></li>
									<li class="footer_li"><a href="cuisine.html">Cuisine</a></li>
									<li class="footer_li"><a href="New In.html">New In</a></li>
									<li class="footer_li"><a href="restaurant.html">Restaurants</a></li>	
								</ul>
							</nav>
						</div>
					</div>

					<div class="column">
						<div>
							<nav>
								
								<ul>
									<li><h2 class="column_head">Popular</h2></li>
									<li class="footer_li"><a href="index.html">Chinese</a></li>
									<li class="footer_li"><a href="cuisine.html">Pizza</a></li>
									<li class="footer_li"><a href="New In.html">Shusi</a></li>
									<li class="footer_li"><a href="restaurant.html">Burger</a></li>
										
								</ul>
							</nav>
						</div>
					</div>
					

					<div class="column">
						<div>
							<nav>
								
								<ul>
									<li><h2 class="column_head">User</h2></li>
									<li class="footer_li"><a href="index.html">Login</a></li>
									<li class="footer_li"><a href="cuisine.html">Register</a></li>
									<li class="footer_li"><a href="New In.html">FAQ</a></li>	
									<li class="footer_li"><a href="restaurant.html">Message</a></li>
								</ul>
							</nav>
						</div>
					</div>
			
					<div class="column">
						<div>
							<nav>
								
								<ul>
									<li><h2 class="column_head">Foodie-Guy</h2></li>
									<li class="footer_li"><a href="index.html">Home</a></li>
									<li class="footer_li"><a href="cuisine.html">Cuisine</a></li>
									<li class="footer_li"><a href="newrecipy.html">New Recipies</a></li>
									<li class="footer_li"><a href="restaurant.html">Restaurants</a></li>	
								</ul>
							</nav>
						</div>
					</div>
					<br>

			</div>
			<br>
			<div class = "mid">
				<span><h2 class="column_head">Leave a Message</h2></span>
				<div class="message">
				<?php
					if($user_name){
				?>
						<form action="{{('/storemessage')}}" method="post">
						{{csrf_field()}}
						<label>Message: </label>
						<textarea rows="4"></textarea><br>
						<div class="controll_group">
							<button type="submit">Send</button>
						</div>
					</form>
				<?php
					}else{
				?>
					<form action="{{('/storemessage')}}" method="post">
						{{csrf_field()}}
						<label>Name: </label>
						<input type="text" name="name" required><br>
						<label>Email: </label>
						<input type="text" name="email" required><br>
						<label>Message: </label>
						<textarea rows="4" name = "message" required></textarea><br>
						<div class="controll_group">
							<button type="submit">Send</button>
						</div>
					</form>
					<?php }?>
				</div>
			</div>
			<hr>
			<div class = "bottom">
				<div class="links">
					<ul>
						<li><a href="https://plus.google.com/u/0/100176714962618354106" target="_blank"><img src="">Google</a></li>
						<li><a href="https://www.facebook.com/mih133" target="_blank"><img src="">Facebook</a></li>
						<li><a href="https://www.instagram.com/iammimranh/?hl=en" target="_blank"><img src="">Instagram</a></li>
						<li><a href="https://github.com/imranhcseru" target="_blank"><img src="">Github</a></li>
					</ul>
				</div>
				<div class="copyright">
					<ul>
						<li class="copy"><p>Copyright &copy Foodie-Guy</p></li>
						<li class="credit"><p>Created By: Imran</p></li>
					</ul>
				</div>

			</div>
		</div>
	</footer>
</body>
</html>