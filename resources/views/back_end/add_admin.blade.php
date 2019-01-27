
@extends('back_end.layout')
@section('content')
<div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Admins</h2>
                    </div>
					<div class="box-content">
                        <h3 style="color:red;">
                            <?php 
                                
                                $message = Session::get('warning');
                                if($message){
                                    echo $message;
                                    Session::put('warning',null);
                                }
                            ?>
                        </h3>
                        <form class="form-horizontal" action="{{url('/admin/storeadmin')}}" method="post" enctype = "multipart/form-data">
                                {{csrf_field()}}
                                    <fieldset>
                                        <div class="control-group">
                                        <label class="control-label" for="typeahead">Name</label>
                                        <div class="controls">
                                            <input type="text" class="span6 typeahead" id="typeahead"  name = "name">
                                        </div>
                                        </div>             
                                        <div class="control-group">
                                        <label class="control-label" for="typeahead">Email</label>
                                        <div class="controls">
                                            <input type="text" class="span6 typeahead" id="typeahead"  name = "email">
                                        </div>
                                        </div>
                                        <div class="control-group">
                                        <label class="control-label" for="typeahead">Password</label>
                                        <div class="controls">
                                            <input type="password" class="span6 typeahead" id="typeahead"  name = "password">
                                        </div>
                                        </div>
                                        <div class="control-group">
                                        <label class="control-label" for="typeahead">Confirm Pasword</label>
                                        <div class="controls">
                                            <input type="password" class="span6 typeahead" id="typeahead"  name = "con_password">
                                        </div>
                                        </div>
                                        <div class="form-actions">
                                        <button type="submit" class="btn btn-primary" name = "submit" value= "publish">Add Admin</button>
                                        </div>
                                    </fieldset>
                                    </form>   

                    </div>
				</div><!--/span-->
			</div><!--/row-->
@endsection
