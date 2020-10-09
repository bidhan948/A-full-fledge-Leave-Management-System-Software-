<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('admin_id')) {
            if (!$request->session('admin_role') == 1) {
                return redirect('admin/employee/edit/'.session('admin_id'));
            }
        } else {
            $request->session()->flash('msg', 'Acess denied');
            return redirect('admin/login');
        }
        return $next($request);
    }
}
