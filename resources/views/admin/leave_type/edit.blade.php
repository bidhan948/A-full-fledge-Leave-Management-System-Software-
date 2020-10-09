@extends('admin/layout.layout')

@section('page_title','Manage leave type')

@section('container')

   <div class="">
                  <div class="page-title">
                     <div class="title_left">
                        <h3>Manage Post</h3>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12 ">
                        <div class="x_panel">
                           <div class="x_content">
                              <br />
                           <form class="form-horizontal form-label-left" method="POST" action="{{url('admin/leave_type/update/'.$result[0]->id)}}">
                              @csrf
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Leave type</label>
                                    <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Enter leave type" name="leave_type" value="{{$result[0]->leave_type}}">
                                       <p class="my-1" style="color:red;"> @error('leave_type')
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