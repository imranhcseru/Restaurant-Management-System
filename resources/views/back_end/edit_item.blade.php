
@extends('back_end.layout')
        @section('content')
				<div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Item-{{$data['item']->item_name}}</h2>
                    </div>
            <div class="box-content">
                        <div class="control-group">
							  <label class="control-label" for="fileInput"></label>
							  <div class="controls">
								<img src="/upload/{{$data['item']->image}}">
							  </div>
						</div>
              <form class="form-horizontal" action="{{url('/admin/updateitem/'.$data['item']->id)}}" method="post" enctype = "multipart/form-data">
              {{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Item Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name = "item_name" value = {{$data['item']->item_name}}> 
							  </div>
                            </div>             
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Price</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name = "price" value = {{$data['item']->price}}>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Item Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name = "item_img" value = {{$data['item']->image}}>
							  </div>
							</div>          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Item Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name = "item_desc">{{$data['item']->item_desc}}</textarea>
							  </div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="selectError3">Category</label>
								<div class="controls">
								  <select id="selectError3" name = "category" value = {{$data['item']->category}}>
										@foreach($data['categories'] as $category)
											<option>{{$category->category}}</option>
										@endforeach
								  </select>
								</div>
							  </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name = "submit" value= "publish">Update Item</button>
							</div>
						  </fieldset>
						</form>   

          </div>
					</div>
					</div>
        @endsection