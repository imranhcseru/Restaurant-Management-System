
@extends('back_end.layout')
@section('content')
<div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Published Items</h2>
                    </div>
					<div class="box-content">
					<h3 style="color:green">
							<?php
									$change_message = Session::get('change_message');
									if($change_message){
										echo($change_message);
										Session::put('change_message',null);
									}
							?>
						</h3>
						<table class="table ">
						  <thead>
							  <tr>
                                  <th>Item</th>
								  <th>Category</th>
								  <th>Available Product</th>
                                  <th>Create Date</th>
                                  <th>Added By</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                            @foreach($items as $item)
							<tr>
                                <td>{{$item->item_name}}</td>
								<td>{{$item->category}}</td>
								<td>{{$item->available}}</td>
                                <td>{{$item->create_date}}</td>
                                <td>{{$item->added_by}}</td>
								<td class="center">
									<a class="btn btn-info" href="{{url('/admin/addsupply/'.$item->id)}}">
										<i>Add Supply</i>  
									</a>
									<a class="btn btn-danger" href="{{url('/admin/changetype/'.$item->id)}}" onclick="return confirm('Are you sure you want to Unpublish this Item?');">
										<i>Unpublish</i> 
									</a>
								</td>
                            </tr>
                            @endforeach
						  </tbody>
					    </table>            
                    </div>
					</div>
					</div>
@endsection