<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use PhpParser\Node\Expr\Isset_;

class leave_type extends Controller
{
    function listing()
    {
        $data['resultD'] = DB::table('leave_type')->orderby('id', 'desc')->get();
        return VIEW('admin.leave_type.list', $data);
    }
    function submit(Request $r)
    {
        $r->validate([
            'leave_type' => 'required'
        ]);
        if (isset($_POST['submit'])) {
            $leave_type = $r->input('leave_type');
            DB::table('leave_type')->insert(array(
                'leave_type' => $leave_type
            ));
            return redirect('admin/leave_type/list');
        }
    }
    function delete(Request $r, $id)
    {
        DB::table('leave_type')->where('id', $id)->delete();
        return redirect('admin/leave_type/list');
    }
    function edit(Request $r, $id)
    {
        $data['result'] = DB::table('leave_type')->where('id', $id)->get();
        return view('admin/leave_type/edit', $data);
    }
    function update(Request $r, $id)
    {
        $r->validate([
            'leave_type' => 'required'
        ]);
        if (isset($_POST['submit'])) {
            $leave_type = $r->input('leave_type');
            DB::table('leave_type')->where('id', $id)->update(array(
                'leave_type' => $leave_type
            ));
            return redirect('admin/leave_type/list');
        }
    }
}
