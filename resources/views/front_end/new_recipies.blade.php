@extends('front_end.layout')
@section('content')
<section class = "holder">
		<div class="container">
			<div class="box-content">
				<div class="identify">
					<h2>New Recipies</h2>
				</div>

			<div>
                @foreach($data['new_recipies'] as $item)
				<li>
					<div class="food_box">
						
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