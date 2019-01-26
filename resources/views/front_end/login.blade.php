@extends('front_end.layout')
@section('content')
<section class = "holder">
		<div class="container">
			<div class="box_content">
				<span class="box_message"><h2>Log in to your account</h2></span>
				<h3 style="color:red;">
                            <?php 
								$login_message = Session::get('login_warning');
								
                                if($login_message){
                                    echo $login_message."<br>";
                                    Session::put('login_warning',null);
								}
								
                            ?>
                        </h3>
				<form action="{{url('/checkuser')}}" method="post">
					{{csrf_field()}}
					<div class="controll_group">
						<label>Email</label>
						<input type="text" name="email" autocomplete = "off" value="">
					</div>
					<div class="controll_group">
						<label>Password</label>
						<input type="password" name="password" autocomplete = "off" value = "">
					</div>
					
					<div class="controll_group">
						<button type="submit">Log in</button>
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