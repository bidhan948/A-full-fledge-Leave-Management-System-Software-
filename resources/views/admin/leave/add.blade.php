@extends('admin/layout.layout')

@section('page_title','Add Leave')

@section('container')

   <div class="">
                  <div class="page-title">
                     <div class="title_left">
                        <h3>Apply Leave</h3>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12 ">
                        <div class="x_panel">
                           <div class="x_content">
                              <br />
                           <form class="form-horizontal form-label-left" method="POST" action="{{url('admin/leave/submit')}}">
                              @csrf
                              <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Select Leave type</label>
                                <div class="col-md-9 col-sm-9 ">
                                   <select name="leave_id" class="form-control">
                                      @foreach ($result as $item)
                                   <option value="{{$item->id}}">{{$item->leave_type}}</option>
                                      @endforeach
                                   </select>
                                   <p class="my-1" style="color:red;"> @error('leave_id')
                                      {{$message}}
                                     @enderror</p>
                                </div>
                             </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">From</label>
                                    <div class="col-md-9 col-sm-9 ">
                                    <input type="date" class="form-control" name="leave_from" >
                                       <p class="my-1" style="color:red;"> @error('leave_from')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">To</label>
                                    <div class="col-md-9 col-sm-9 ">
                                    <input type="date" class="form-control" name="leave_to" >
                                       <p class="my-1" style="color:red;"> @error('leave_to')
                                          {{$message}}
                                         @enderror</p>
                                    </div>
                                 </div>
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Leave description</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" class="form-control" placeholder="Enter Leave description" name="leave_description">
                                       <p class="my-1" style="color:red;"> @error('leave_description')
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