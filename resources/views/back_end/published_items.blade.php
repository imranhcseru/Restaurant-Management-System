<?php
    $user_email = Session::get('user_email');
    if(!$user_email){
        return redirect()->back();
    }
 ?>

@extends('back_end.layout')
@section('content')
<div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Published Items</h2>
                    </div>
					<div class="box-content">
						<table class="table ">
						  <thead>
							  <tr>
                                  <th>Item</th>
								  <th>Category</th>
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
                                <td>{{$item->create_date}}</td>
                                <td>{{$item->added_by}}</td>
								<td>
									<a class="btn btn-info" href="{{('admin/unpublishitem')}}" onclick="return confirm('Are you sure you want to Unpublish this Item?');">
										<i>Unpublish</i>  
									</a>
									<a class="btn btn-danger" href="{{('admin/addproduct')}}" >
										<i>Add Product</i> 
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