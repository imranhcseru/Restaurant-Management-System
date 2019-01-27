
@extends('back_end.layout')
@section('content')
<div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>All Items</h2>
                    </div>
					<div class="box-content">
					<h3 style="color:green">
						<?php
                            $update_item = Session::get('update_item');
                            $delete_item = Session::get('delete_item');
                            if($delete_item){
                                echo($delete_item);
                                Session::put('delete_item',null);
                            }
                            if($update_item){
                                echo($update_item);
                                Session::put('update_item',null);
                            }
                        ?>
					</h3>
						<table class="table ">
						  <thead>
							  <tr>
                                  <th>Item</th>
								  <th>Category</th>
                                  <th>Price</th>
                                  <th>Published/Draft</th>
                                  <th>Create Date</th>
                                  <th>Updated date</th>
                                  <th>Added By</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                            @foreach($items as $item)
							<tr>
                                <td>{{$item->item_name}}</td>
								<td>{{$item->category}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->create_date}}</td>
                                <td>{{$item->update_date}}</td>
                                <td>{{$item->added_by}}</td>
								<td class="center">
									<a class="btn btn-info" href="{{url('/admin/edititem/'.$item->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{url('/admin/deleteitem/'.$item->id)}}" onclick="return confirm('Are you sure you want to delete this Item?');">
										<i class="halflings-icon white trash"></i> 
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