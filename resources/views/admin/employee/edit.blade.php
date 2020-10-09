@extends('admin/layout.layout')

@section('page_title','Manage Employee')

@section('container')

   <div class="">
                  <div class="page-title">
                     <div class="title_left">
                        <h3>Manage Employee</h3>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12 ">
                        <div class="x_panel">
                           <div class="x_content">
                              <br />
                           <form class="form-horizontal form-label-left" method="POST" action="{{url('admin/employee/update/'.$result[0]->id)}}">
                              @csrf
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Employee name</label>
                                    <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Enter employee name" name="name" value="{{$result[0]->name}}">
                                       <p class="my-1" style="color:red;"> @error('name')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                    <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Enter your email" name="email" value="{{$result[0]->email}}">
                                       <p class="my-1" style="color:red;"> @error('email')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Mobile no</label>
                                    <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Enter employee name" name="mobile" value="{{$result[0]->mobile}}">
                                       <p class="my-1" style="color:red;"> @error('mobile')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">password</label>
                                    <div class="col-md-9 col-sm-9 ">
                                    <input type="password" class="form-control" placeholder="Enter your password" name="password" >
                                       <p class="my-1" style="color:red;"> @error('password')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Department</label>
                                    <div class="col-md-9 col-sm-9 ">
                                    @if(session('admin_role')==1)   
                                       <select name="department_id" class="form-control">
                                          @foreach ($resultD as $item)
                                       @if($item->id == $result[0]->department_id)
                                       <option value="{{$item->id}}" selected>{{$item->department}}</option>
                                       @endif
                                       <option value="{{$item->id}}">{{$item->department}}</option>
                                          @endforeach
                                       </select>
                                       <p class="my-1" style="color:red;"> @error('department_id')
                                          {{$message}}
                                         @enderror</p>
                                    @else
                                    @foreach ($resultD as $item)
                                    @if($item->id == session('Department_id'))
                                       <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control"   value="{{$item->department}}" disabled>
                                          </div>    
                                    @endif
                                    @endforeach
                                     
                                    @endif
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Address</label>
                                    <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Enter employee address" name="address" value="{{$result[0]->address}}">
                                       <p class="my-1" style="color:red;"> @error('address')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Birthday</label>
                                    <div class="col-md-9 col-sm-9 ">
                                    <input type="date" class="form-control" name="birthday" value="{{$result[0]->birthday}}">
                                       <p class="my-1" style="color:red;"> @error('birthday')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 @if(session('admin_role')==1)
                                 <div class="ln_solid"></div>
                                 <div class="form-group">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                       <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                    </div>
                                 </div>  
                                 @endif
                           </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            

@endsection