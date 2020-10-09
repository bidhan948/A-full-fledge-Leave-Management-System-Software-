@extends('admin/layout.layout')

@section('page_title','Employee List')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>Leave report</h4>
			@if (session('admin_role')==2)
		 		<h2><a href="{{url('admin/leave/add')}}">Add Leave</a></h2>		
			@endif
		 </div>
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
		 <div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
			   <div class="x_content">
				  <div class="row">
					 <div class="col-sm-12">
						<div class="card-box table-responsive">
						   <table id="datatable" class="table table-striped table-bordered" style="width:100%">
							  <thead>
								 <tr>
									<th>I.D</th>
									<th>Employee Name</th>
									<th>From</th>
                                    <th>To</th>
                                    <th>Description</th>
									<th>Status</th>
									<th colspan="2">Action</th>
								 </tr>
							  </thead>
							  <tbody>
								
							@foreach ($resultD as $item)
								@if (session('admin_role')==1)
									<tr>
										<td>{{$item->id}}</td>
										<th>{{$item->name}}</th>
										<td>{{$item->leave_from}}</td>
										<td>{{$item->leave_to}}</td>
										<td>{{$item->leave_description}}</td>
										<td>
											@if($item->leave_status ==1)
											   {{  'applied' }}									
											@elseif($item->leave_status == 2)
											{{  'approved' }}
											@else
											{{ 'rejected' }}
											@endif
										</td>
										@if ($item->leave_status == 1)
										<td><a href="{{url('admin/leave/delete/'.$item->id)}}" class="text-danger">Delete</a></td>
										@else
										<td><a class="text-warning">Checked</a></td>
										@endif
									   @if (session('admin_role')==1)
									   <td><a href="{{url('admin/leave/edit/'.$item->id)}}" class="text-success">Approve or Reject?</a></td>	
									   @endif
								   </tr>
								   @elseif(session('admin_role')==2 && session('admin_id') == $item->employee_id)
								   <tr>
									<td>{{$item->id}}</td>
									<th>{{$item->name}}</th>
									<td>{{$item->leave_from}}</td>
									<td>{{$item->leave_to}}</td>
									<td>{{$item->leave_description}}</td>
									<td>
										@if($item->leave_status ==1)
										   {{  'applied' }}									
										@elseif($item->leave_status == 2)
										{{  'approved' }}
										@else
										{{ 'rejected' }}
										@endif
									</td>
									@if ($item->leave_status == 1)
									<td><a href="{{url('admin/leave/delete/'.$item->id)}}" class="text-danger">Delete</a></td>
									@else
									<td><a class="text-warning">Checked</a></td>
									@endif
								   @if (session('admin_role')==1)
								   <td><a href="{{url('admin/leave/edit/'.$item->id)}}" class="text-success">Approve or Reject?</a></td>	
								   @endif
							   </tr>
									@endif
							@endforeach
							  </tbody>
						   </table>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>
@endsection