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
                           <form class="form-horizontal form-label-left" method="POST" action="{{url('admin/employee/submit')}}">
                              @csrf
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Employee name</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" class="form-control" placeholder="Enter employee name" name="name">
                                       <p class="my-1" style="color:red;"> @error('name')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" class="form-control" placeholder="Enter your email" name="email">
                                       <p class="my-1" style="color:red;"> @error('email')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Mobile no</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" class="form-control" placeholder="Enter employee name" name="mobile">
                                       <p class="my-1" style="color:red;"> @error('mobile')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">password</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="password" class="form-control" placeholder="Enter your password" name="password">
                                       <p class="my-1" style="color:red;"> @error('password')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Department</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <select name="department_id" class="form-control">
                                          @foreach ($result as $item)
                                       <option value="{{$item->id}}">{{$item->department}}</option>
                                          @endforeach
                                       </select>
                                       <p class="my-1" style="color:red;"> @error('department_id')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Address</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" class="form-control" placeholder="Enter employee name" name="address">
                                       <p class="my-1" style="color:red;"> @error('address')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Birthday</label>
                                    <div class="col-md-9 col-sm-9 ">
                                    <input type="date" class="form-control" name="birthday" >
                                       <p class="my-1" style="color:red;"> @error('birthday')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="ln_solid"></div>
                                 <div class="form-group">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                       <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                    </div>
                                 </div>
                           </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            

@endsection