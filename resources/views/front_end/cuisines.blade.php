@extends('front_end.layout')
@section('content')
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