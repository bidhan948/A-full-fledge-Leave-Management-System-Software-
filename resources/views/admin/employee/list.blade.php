@extends('admin/layout.layout')

@section('page_title','Employee List')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>Department</h4>
		 <h2><a href="{{url('admin/employee/add')}}">Add Employee</a></h2>
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
									<th>Name</th>
									<th>Email</th>
									<th>Mobile</th>
									<th colspan="2">Action</th>
								 </tr>
							  </thead>
							  <tbody>
								
								@foreach ($resultD as $item)
									
								 <tr>
								 <td>{{$item->id}}</td>
								 <td>{{$item->name}}</td>
								 <td>{{$item->email}}</td>
								 <td>{{$item->mobile}}</td>
								 <td><a href="{{url('admin/employee/edit/'.$item->id)}}" class="text-success">Edit</a></td>
									<td><a href="{{url('admin/employee/delete/'.$item->id)}}" class="text-danger">Delete</a></td>
								 </tr>
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