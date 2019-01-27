
@extends('back_end.layout')
@section('content')
<div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>All Orders</h2>
                    </div>
					<div class="box-content">
					<div class="box-content">
						<table class="table ">
						  <thead>
							  <tr>
                                  <th>Item</th>
                                  <th>Quantity</th>
								  <th>Name</th>
                                  <th>Email</th>
                                  <th>Contact Number</th>
                                  <th>Address</th>
                                  <th>Served/Unserved</th>
                                  <th>Date</th>
							  </tr>
						  </thead>
						  <tbody>
                            @foreach($all_orders as $order)
							<tr>
                                <td>{{$order->item_name}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->type}}</td>
                                <td>{{$order->date}}</td> 
                            </tr>
                            @endforeach
						  </tbody>
					    </table>            
                    </div>
                    </div>
					</div>
					
@endsection