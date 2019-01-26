@extends('front_end.layout')
@section('content')
<section class = "holder">
		<div class="container">
			<div class="box_content">
				<span class="box_message"><h2>Stay connected with us</h2></span>
				<h3 style="color:red;">
                            <?php 
								$password_message = Session::get('password_warning');
								$email_message = Session::get('email_warning');
                                if($password_message){
                                    echo $password_message."<br>";
                                    Session::put('password_warning',null);
								}
								else if($email_message){
                                    echo $email_message;
                                    Session::put('email_warning',null);
                                }
                            ?>
                        </h3>
				<form action="{{url('/storeuser')}}" method="post">
				{{csrf_field()}}
					<div class="controll_group">
						<label>Name</label>
						<input type="text" name="name" required>
					</div>
					<div class="controll_group">
						<label>Email</label>
						<input type="email" name="email" required>
					</div>
					<div class="controll_group">
						<label>Password</label>
						<input type="password" name="password" required>
					</div>
					<div class="controll_group">
						<label>Confirm Password</label>
						<input type="password" name="con_password" required>
					</div>
					<div class="controll_group">
						<button type="submit">Register</button>
					</div>
				</form>
			</div>
		</div>
    </section>
    <hr>
	<section class = "cuisine">
		<div class="container">
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
	</section>
	<hr>
@endsection