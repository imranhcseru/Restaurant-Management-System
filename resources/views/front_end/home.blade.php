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

	<section class = "cover">
		<div class="container">
			<span class="cover_box"><h2 class="text">We Provide Quality Food</h2></span>	
		</div>
	</section>
	<hr>

	<section class = "cuisine">
		<div class="container">
		<div class="box_content">
			<div class="identify">
				<h2>Cuisine</h2>
			</div>

			<div>
				<ul class="item_ul">
					@foreach($data['categories'] as $category)
					<li><div class="item"><a href="{{url('/category/'.$category->category)}}"><img class = "logo_cuisine" src="/upload/{{$category->image}}"><br><b>{{$category->category}}</b></a></div></li>
					@endforeach
				</ul>
			</div>
		</div>
</div>
	</section>
	<hr>

	<section class = "holder">
		<div class="container">
			<div class="box-content">
				<div class="identify">
					<h2>New Recipies</h2>
				</div>

			<div>
                @foreach($data['items'] as $item)
				<li>
					<div class="food_box">
						<a href="">
							<div>
								<div class="img_box">
									<span ><a href="{{url('/itemdetails/'.$item->id)}}"><img src="/upload/{{$item->image}}"></a></span>
								</div>
								<div class="content_box">
									<span class = "price">Price: </span><span>৳ {{$item->price}}</span>
									<span ><a class = "order" href="{{('/order/'.$item->id)}}">Order Now</a></span>
									<a href="{{url('/itemdetails/'.$item->id)}}"><p class="food_name">{{$item->item_name}}</p></a>
								</div>
							</div>
						</a>
					</div>
				</li>
                @endforeach
                <div class = "see_more"><a href="{{('/newrecipies')}}">See More</a></div>
				</div>
		</div>
	</section>
	<hr>

	<section class = "review">
		<div class="container">
			<div class="identify">
				<h2>Reviews</h2>
			</div>

			<div class="master_review">
				@foreach($data['message'] as $message)
					<div class="review_box">
						<div class="reviewer">
							<span class="user"><legend><h2>{{$message->name}}</h2></legend></span>
						</div>
						<div class="review_text">
							<span ><p>{{$message->message}}</p></span>
						</div>
					</div>
				@endforeach
			</div>
			
		</div>
	</section>
	<hr>

	<footer>
		<div class="foot_container">
			<div class = "top">
					<div class="column">
						<div>
							<nav>
								
								<ul>
									<li><h2 class="column_head">Discover</h2></li>
									<li><a href="{{url('/')}}">Home</a></li>
									<li><a href="{{('/cuisines')}}">Cuisines</a></li>	
									<li><a href="{{('/newrecipies')}}">New Recipies</a></li>
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
									<li class="footer_li"><a href="">Chinese</a></li>
									<li class="footer_li"><a href="">Pizza</a></li>
									<li class="footer_li"><a href="">Shusi</a></li>
									<li class="footer_li"><a href="">Burger</a></li>
										
								</ul>
							</nav>
						</div>
					</div>
					

					<div class="column">
						<div>
							<nav>
								
								<ul>
									<li><h2 class="column_head">User</h2></li>
									<li><a href = "{{url('/login')}}">Log In</a></li>
									<li><a href="{{url('/register')}}">Register</a></li>
									<li class="footer_li"><a href="">FAQ</a></li>	
									<li class="footer_li"><a href="">Message</a></li>
								</ul>
							</nav>
						</div>
					</div>
			
					<div class="column">
						<div>
							<nav>
								
								<ul>
									<li><h2 class="column_head">Foodie-Guy</h2></li>
									<li class="footer_li"><a href="{{url('/')}}">Home</a></li>
									<li class="footer_li"><a href="cuisine.html">About Us</a></li>
									<li class="footer_li"><a href="newrecipy.html">Blog</a></li>
									<li class="footer_li"><a href="">User Reviews</a></li>	
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
						<textarea rows="4" name = "message"></textarea><br>
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