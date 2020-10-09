<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use PhpParser\Node\Expr\Isset_;

class department extends Controller
{
    function listing (){
        if(session('admin_role') == 2){
            return redirect('unknown');
        }
        $data['resultD'] = DB::table('department')->orderby('id', 'desc')->get();
        return VIEW('admin.department.list',$data);
    }
    function add(){
        if(session('admin_role') == 2){
            return redirect('unknown');
        }
        return view('admin/department/add');
    }
    function submit (Request $r){
        if(session('admin_role') == 2){
            return redirect('unknown');
        }
        $r->validate([
            'department'=>'required'
        ]);
        if(isset($_POST['submit'])){
            $department = $r->input('department');
            DB::table('department')->insert(array(
                'department'=>$department
            ));
            return redirect('admin/department/list');
        }

    }
    function delete(Request $r ,$id){
        if(session('admin_role') == 2){
            return redirect('unknown');
        }
        DB::table('department')->where('id',$id)->delete();
        return redirect('admin/department/list');
    }
    function edit(Request $r, $id){
        if(session('admin_role') == 2){
            return redirect('unknown');
        }
        $data['result'] = DB::table('department')->where('id',$id)->get();
        return view('admin/department/edit',$data);
    }
    function update(Request $r, $id){
        if(session('admin_role') == 2){
            return redirect('unknown');
        }
        $r->validate([
            'department'=>'required'
        ]);
        if(isset($_POST['submit'])){
            $department = $r->input('department');
            DB::table('department')->where('id',$id)->update(array(
                'department'=>$department
            ));
            return redirect('admin/department/list');
        }
    }
}
