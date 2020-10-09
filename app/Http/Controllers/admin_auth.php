<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class admin_auth extends Controller
{
    function login(Request $r)
    {
        $email = $r->input('email');
        $password = $r->input('password');
        $result = DB::table('employee')
            ->where('email', $email)
            ->where('password', $password)->get();
        if (isset($result[0]->id)) {
            if ($result[0]->role == 1) {
                $r->session()->put('admin_id', $result[0]->id);
                $r->session()->put('Department_id',$result[0]->department_id);
                $r->session()->put('admin_name', $result[0]->name);
                $r->session()->put('admin_role', $result[0]->role);
                return redirect('admin/department/list');
            }else{
                $r->session()->put('admin_id', $result[0]->id);
                $r->session()->put('admin_name', $result[0]->name);
                $r->session()->put('Department_id',$result[0]->department_id);
                $r->session()->put('admin_role', $result[0]->role);
                return redirect('admin/employee/edit/'.$result[0]->id);
            }
        } else {
            $r->session()->flash('msg', 'please enter valid login detail');
            return redirect('admin/login');
        }
    }
    function logout(Request $r)
    {
        $r->session()->forget('admin_id');
        $r->session()->forget('admin_name');
        $r->session()->forget('admin_role');
        $r->session()->flash('msg', 'Logged out successfully');
        return redirect('admin/login');
    }
}
