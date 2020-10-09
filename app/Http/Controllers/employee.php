<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use PhpParser\Node\Expr\Isset_;


class employee extends Controller
{
    function add(){
        if(session('admin_role') == 2){
            return redirect('unknown');
        }
        $data['result'] = DB::table('department')->orderBy('department')->get();
        return view('admin/employee/add',$data);

    }
    function listing(){
        if(session('admin_role') == 2){
            return redirect('unknown');
        }
        $data['resultD'] = DB::table('employee')->orderBy('id','desc')->get();
        return view('admin/employee/list',$data);
    }
    function submit (Request $r){
        $r->validate([
            'name'=>'required',
            'email'=>'required|unique:employee',
            'mobile'=>'required',
            'password'=>'required',
            'department_id'=>'required',
            'address'=>'required',
            'birthday'=>'required'
        ]);
        if(isset($_POST['submit'])){
            $name = $r->input('name');
            $email = $r->input('email');
            $password = $r->input('password');
            $mobile = $r->input('mobile');
            $department_id = $r->input('department_id');
            $address = $r->input('address');
            $birthday = $r->input('birthday');

            DB::table('employee')->insert(array(
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
                'mobile'=>$mobile,
                'department_id'=>$department_id,
                'address'=>$address,
                'birthday'=>$birthday,
                'role'=>2,

            ));
            return redirect('admin/employee/list');
        }

    }
    function delete(Request $r ,$id){
        if(session('admin_role') == 2){
            return redirect('unknown');
        }
        DB::table('employee')->where('id',$id)->delete();
        return redirect('admin/employee/list');
    }
    function edit(Request $r, $id){
        if(session('admin_role')== 2 && session('admin_id')!= $id ){
            return redirect('unknown');
        }
        $data['result'] = DB::table('employee')->where('id',$id)->get();
        $data2['resultD'] = DB::table('department')->get();
        return view('admin/employee/edit')->with($data)->with($data2);
    }
    function update(Request $r, $id){
        if(session('admin_role') == 2){
            return redirect('unknown');
        }
        $r->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'password'=>'required',
            'department_id'=>'required',
            'address'=>'required',
            'birthday'=>'required'
        ]);
        if(isset($_POST['submit'])){
            $name = $r->input('name');
            $email = $r->input('email');
            $password = $r->input('password');
            $mobile = $r->input('mobile');
            $department_id = $r->input('department_id');
            $address = $r->input('address');
            $birthday = $r->input('birthday');
            DB::table('employee')->where('id',$id)->update(array(
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
                'mobile'=>$mobile,
                'department_id'=>$department_id,
                'address'=>$address,
                'birthday'=>$birthday,
            ));
            return redirect('admin/employee/list');
        }
    }
}
