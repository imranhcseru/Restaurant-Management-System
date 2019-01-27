

@extends('back_end.layout')
@section('content')
<div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Reviews from Users</h2>
                    </div>
					<div class="box-content">
					<div class="box-content">
						<table class="table ">
						  <thead>
							  <tr>
								  <th>Message</th>
								  <th>Name</th>
                                  <th>Email</th>
                                  <th>Date</th>
							  </tr>
						  </thead>
						  <tbody>
                            @foreach($reviews as $review)
							<tr>
                                <td>{{$review->message}}</td>
                                <td>{{$review->name}}</td>
                                <td>{{$review->email}}</td>
                                <td>{{$review->date}}</td>
                            </tr>
                            @endforeach
						  </tbody>
					    </table>            
                    </div>
                    </div>
					</div>
					
@endsection