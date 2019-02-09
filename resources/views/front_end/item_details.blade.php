@extends('front_end.layout')
@section('content')
<section class = "holder">
		<div class="container">
			<div class="box-content">
				<div class="identify">
					<h2>Item Details</h2>
				</div>

			<div class="item_details">
				
                <span ><img class="item_image" src="/upload/{{$data['item']->image}}"></span><br>
                <span class="food_name">{{$data['item']->item_name}}</span><br>
                <span class="price">৳ {{$data['item']->price}}</span><br>
                <span ><a class = "order" href="{{('/order/'.$data['item']->id)}}">Order Now</a></span>
                <div class="item_desc">
                <span>{{$data['item']->item_desc}}</span>
                </div>
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