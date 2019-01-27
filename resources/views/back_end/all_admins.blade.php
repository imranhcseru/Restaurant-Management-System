
@extends('back_end.layout')
@section('content')
<div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>All Admins</h2>
                    </div>
					<div class="box-content">
					<h3 style="color:green">
						<?php
                            $admin_success = Session::get('admin_success');
                            if($admin_success){
                                echo($admin_success);
                                Session::put('admin_success',null);
                            }
                        ?>
					</h3>
						<table class="table ">
						  <thead>
							  <tr>
								  <th>Name</th>
								  <th>Email</th>
								  <th>Added Date</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
                            @foreach($admins as $admin)
							<tr>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
							<td>{{$admin->date}}</td>
							<td class="center">
								<a class="btn btn-info" href="#">
									<i class="halflings-icon white edit"></i>  
								</a>
								<a class="btn btn-danger" href="#">
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