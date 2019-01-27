

@extends('back_end.layout')
        @section('content')
				<div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Item</h2>
                    </div>
            <div class="box-content">
              <form class="form-horizontal" action="{{url('/admin/storeitem')}}" method="post" enctype = "multipart/form-data">
              {{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Item Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name = "item_name">
							  </div>
                </div>             
              <div class="control-group">
							  <label class="control-label" for="typeahead">Price</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name = "price">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Available</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name = "available">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Item Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name = "item_img">
							  </div>
							</div>          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Item Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name = "item_desc"></textarea>
							  </div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="selectError3">Category</label>
								<div class="controls">
								  <select id="selectError3" name = "category">
										@foreach($categories as $category)
											<option>{{$category->category}}</option>
										@endforeach
								  </select>
								</div>
							  </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name = "submit" value= "publish">Publish Item</button>
							  <button type="submit" class="btn btn-primary" name = "submit" value = "draft">Save as Draft</button>
							</div>
						  </fieldset>
						</form>   

          </div>
					</div>
					</div>
        @endsection