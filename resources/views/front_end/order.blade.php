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
                <div class="item_desc">
                <span>{{$data['item']->item_desc}}</span>
                </div>
			</div>
            <div class="orderer">
                <h3 style="color:green;">
                    <?php
                        $order_success = Session::get('order_success');
                        if($order_success){
                            echo($order_success);
                            Session::put('order_success',null);
                        }
                    ?>
                </h3>
                <?php
                    $user_name = Session::get('user_name');
                    if($user_name){
                ?>
                <form action="{{url('/orderitem/'.$data['item']->id)}}" method="post">
                    {{csrf_field()}}
                        <div class="controll_group">
                            <label>Quantity</label>
                            <input type="text" name="quantity" required placeholder="How Many You Want?">
                        </div>
                        <div class="controll_group">
                            <label>Contact Number</label>
                            <input type="text" name="phone" required placeholder="Your Contact Number">
                        </div>
                        <div class="controll_group">
                            <label>Address</label>
                            <input type="text" name="address" required placeholder="Where To Deliver?">
                        </div>
                        <div class="controll_group">
                            <button type="submit">Order</button>
                        </div>
                </form>
                <?php 
                    }else{
                ?>
                <form action="{{url('/orderitem/'.$data['item']->id)}}" method="post">
                    {{csrf_field()}}
                        <div class="controll_group">
                            <label>Quantity</label>
                            <input type="text" name="quantity" required placeholder="How Many You Want?">
                        </div>
                        <div class="controll_group">
                            <label>Name</label>
                            <input type="text" name="name" required placeholder="Enter Your Name">
                        </div>
                        <div class="controll_group">
                            <label>Email</label>
                            <input type="email" name="email" required placeholder="Enter Your Email">
                        </div>
                        <div class="controll_group">
                            <label>Contact Number</label>
                            <input type="text" name="phone" required placeholder="Your Contact Number">
                        </div>
                        <div class="controll_group">
                            <label>Address</label>
                            <input type="text" name="address" required placeholder="Where To Deliver?">
                        </div>
                        <div class="controll_group">
                            <button type="submit">Order</button>
                        </div>
                </form>
                <?php
                    }
                ?>
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