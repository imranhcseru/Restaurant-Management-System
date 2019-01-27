
@extends('back_end.layout')
        @section('content')
				<div class="row-fluid sortable">
        	<div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Item</h2>
                    </div>
            <div class="box-content">
              <form class="form-horizontal" action="{{url('/admin/updatesupply/'.$item->id)}}" method="post" enctype = "multipart/form-data">
              {{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead"></label>
							  <div class="controls">
								<img src="/upload/{{$item->image}}">
							  </div>
              </div>
              <div class="control-group">
							  <label class="control-label" for="typeahead"></label>
							  <div class="controls">
								<h3 style="color:green">
							<?php
									$supply_success = Session::get('supply_success');
									if($supply_success){
										echo($supply_success);
										Session::put('supply_success',null);
									}
							?>
						</h3>
							  </div>
              </div> 
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Item Name</label>
							  <div class="controls">
									<input type="text" class="span6 typeahead" id="typeahead"  name = "item_name" value={{$item->item_name}} disabled>
							  </div>
              </div> 
							<div class="control-group">
									<label class="control-label" for="typeahead">Category</label>
									<div class="controls">
											<input type="text" class="span6 typeahead" id="typeahead"  name = "category" value={{$item->category}} required disabled>
									</div>
							</div>            
              <div class="control-group">
							  <label class="control-label" for="typeahead">Price</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name = "price" value={{$item->price}} disabled>
							  </div>
							</div>
							<div class="control-group">
									<label class="control-label" for="typeahead">Available</label>
									<div class="controls">
										<input type="text" class="span6 typeahead" id="typeahead"  name = "available" value={{$item->available}} disabled>
									</div>
							</div>
              <div class="control-group">
									<label class="control-label" for="typeahead">New Supply</label>
									<div class="controls">
											<input type="text" class="span6 typeahead" id="typeahead"  name = "add_product"}}>
									</div>
							</div>        
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name = "submit" value= "publish">Add New Supply</button>
							</div>
						  </fieldset>
						</form>   

          </div>
				</div>
			</div>
        @endsection