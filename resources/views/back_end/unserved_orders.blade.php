
@extends('back_end.layout')
@section('content')
<div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Unserved Orders</h2>
                    </div>
					<div class="box-content">
					<h3 style="color:green">
                        <?php
                            $serve_success = Session::get('serve_success');
                            if($serve_success){
                                echo($serve_success);
                                Session::put('serve_success',null);
                            }
                        ?>
                    </h3>
                    <h3 style="color:red">
                        <?php
                            $serve_failed = Session::get('serve_failed');
                            if($serve_failed){
                                echo($serve_failed);
                                Session::put('serve_failed',null);
                            }
                        ?>
                    </h3>
						<table class="table ">
						  <thead>
							  <tr>
                                  <th>Item</th>
                                  <th>Quantity</th>
								  <th>Name</th>
                                  <th>Email</th>
                                  <th>Contact Number</th>
                                  <th>Address</th>
                                  <th>Date</th>
                                  <th>Action</th>
							  </tr>
						  </thead>
						  <tbody>
                            @foreach($unserved_orders as $order)
							<tr>
                                <td>{{$order->item_name}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->date}}</td>
                                <td><a href = "{{url('/admin/serveitem/'.$order->id)}}" onclick="return confirm('Are you sure you want to serve this item?');">Serve</a></td> 
                            </tr>
                            @endforeach
						  </tbody>
					    </table>            
                    </div>
                    </div>
					</div>
					
@endsection