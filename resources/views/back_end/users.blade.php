

@extends('back_end.layout')
@section('content')
<div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>All Registered Users</h2>
                    </div>
					<div class="box-content">
					<div class="box-content">
						<table class="table ">
						  <thead>
							  <tr>
								  <th>Name</th>
								  <th>Email</th>
                                  <th>Registration Date</th>
							  </tr>
						  </thead>
						  <tbody>
                            @foreach($users as $user)
							<tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->date}}</td>
                            </tr>
                            @endforeach
						  </tbody>
					    </table>            
                    </div>
                    </div>
					</div>
					
@endsection