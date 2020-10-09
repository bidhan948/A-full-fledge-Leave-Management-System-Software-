<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use PhpParser\Node\Expr\Isset_;


class leave extends Controller
{
    function add(){
        $data['result'] = DB::table('leave_type')->get();
        return view('admin/leave/add',$data);

    }
    function listing(){
        $data['resultD'] = DB::table('leaves')->orderBy('id','desc')->get();
        $data2['result'] = DB::table('employee')->orderBy('id','desc')->get();
        return view('admin/leave/list')->with($data)->with($data2);
    }
    function submit (Request $r){
        $r->validate([
            'leave_id'=>'required',
            'leave_from'=>'required',
            'leave_to'=>'required',
            'leave_description'=>'required'
        ]);
        if(isset($_POST['submit'])){
            $employee_id = session('admin_id');
            $name = session('admin_name');
            $leave_id = $r->input('leave_id');
            $leave_from = $r->input('leave_from');
            $leave_to = $r->input('leave_to');
            $leave_description = $r->input('leave_description');
            $status = 1;
            DB::table('leaves')->insert(array(
                'employee_id'=>$employee_id,
                'name'=>$name,
                'leave_id'=>$leave_id,
                'leave_from'=>$leave_from,
                'leave_to'=>$leave_to,
                'leave_description'=>$leave_description,
                'leave_status'=>$status

            ));
            return redirect('admin/leave/list');
        }

    }
    function delete(Request $r ,$id){
        DB::table('leaves')->where('id',$id)->delete();
        return redirect('admin/leave/list');
    }
    function edit(Request $r, $id){
        if(session('admin_role')== 2 ){
            return redirect('unknown');
        }
        $data['result'] = DB::table('leaves')->where('id',$id)->get();
        return view('admin/leave/edit',$data);
    }
    function update(Request $r, $id){
        if(session('admin_role') == 2){
            return redirect('unknown');
        }
        if(isset($_POST['submit'])){
            $leave_status = $r->input('leave_status');
            DB::table('leaves')->where('id',$id)->update(array(
                'leave_status'=>$leave_status
            ));
            return redirect('admin/leave/list');
        }
    }
}
