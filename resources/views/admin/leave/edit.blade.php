@extends('admin/layout.layout')

@section('page_title','Manage Leaves')

@section('container')

   <div class="">
                  <div class="page-title">
                     <div class="title_left">
                        <h3>Manage Leaves</h3>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12 ">
                        <div class="x_panel">
                           <div class="x_content">
                              <br />
                           <form class="form-horizontal form-label-left" method="POST" action="{{url('admin/leave/update/'.$result[0]->id)}}">
                              @csrf
                                 
                             <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 mt-0" style="font-size: 1.2rem;">Choose Action?</label>
                                <div class="col-md-9 col-sm-9 ">
                                   <select name="leave_status" class="form-control">
                                   <option value="2">Approve</option>
                                   <option value="3">Reject</option>
                                   </select>
                                   <p class="my-1" style="color:red;"> @error('leave_status')
                                      {{$message}}
                                     @enderror</p>
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