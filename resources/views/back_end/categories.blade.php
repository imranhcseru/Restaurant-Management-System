
@extends('back_end.layout')
@section('content')
<div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>All Categories</h2>
                    </div>
					<div class="box-content">
                    <h3 style="color:green">
						<?php
                            $delete_category = Session::get('delete_category');
                            if($delete_category){
                                echo($delete_category);
                                Session::put('delete_category',null);
                            }
                        ?>
					</h3>
						<table class="table ">
						  <thead>
							  <tr>
								  <th>Category</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                            @foreach($categories as $category)
							<tr>
                            <td><a href="{{url('/admin/'.$category->category)}}">{{$category->category}}</a></td>
								<td class="center">
									<a class="btn btn-info" href="">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');" href="{{url('/admin/delete/'.$category->id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
                            </tr>
                            @endforeach
						  </tbody>
					    </table>            
                    </div>
                    
                        <h2 style="text-align:center;">Add New Category</h2>
                    
                    <div class="box-content">
                        <form class="form-horizontal" action="{{url('/admin/addcategory')}}" method="post" enctype = "multipart/form-data">
                             {{csrf_field()}}
                                    <fieldset>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Category</label>
                                            <div class="controls">
                                                <input type="text" class="span6 typeahead" id="typeahead"  name = "category">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="fileInput">Category Image</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="fileInput" type="file" name = "category_img">
                                            </div>
                                        </div>
                                        <div class="form-actions" style="text-align:center;">
                                        <button  type="submit" class="btn btn-primary" name = "submit" value= "publish">Add Category</button>
                                        </div>
                                    </fieldset>
                        </form> 
                    </div>
                    </div>
                    </div>
				
			
			
@endsection