<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/admin/login', 'admin/login');

Route::post('admin/login_submit', 'App\Http\Controllers\admin_auth@login');
Route::get('admin/logout', 'App\Http\Controllers\admin_auth@logout');

// authenticating user  through gropu middleware here
Route::group(['middleware' => ['admin_auth']], function () {
        // this is for department part
        Route::get('/admin/department/list', 'App\Http\Controllers\department@listing');
        Route::get('/admin/department/add', 'App\Http\Controllers\department@add');
        Route::post('admin/department/submit', 'App\Http\Controllers\department@submit');
        Route::get('admin/department/delete/{id}', 'App\Http\Controllers\department@delete');
        Route::get('admin/department/edit/{id}', 'App\Http\Controllers\department@edit');
        Route::post('admin/department/update/{id}', 'App\Http\Controllers\department@update');

        // this is for leave_type
        Route::get('/admin/leave_type/list', 'App\Http\Controllers\leave_type@listing');
        Route::view('/admin/leave_type/add', 'admin/leave_type/add');
        Route::post('admin/leave_type/submit', 'App\Http\Controllers\leave_type@submit');
        Route::get('admin/leave_type/delete/{id}', 'App\Http\Controllers\leave_type@delete');
        Route::get('admin/leave_type/edit/{id}', 'App\Http\Controllers\leave_type@edit');
        Route::post('admin/leave_type/update/{id}', 'App\Http\Controllers\leave_type@update');

        // this is for employee
        Route::get('/admin/employee/list', 'App\Http\Controllers\employee@listing');
        Route::get('/admin/employee/add', 'App\Http\Controllers\employee@add');
        Route::post('admin/employee/submit', 'App\Http\Controllers\employee@submit');
        Route::get('admin/employee/delete/{id}', 'App\Http\Controllers\employee@delete');
        Route::get('admin/employee/edit/{id}', 'App\Http\Controllers\employee@edit');
        Route::post('admin/employee/update/{id}', 'App\Http\Controllers\employee@update');

        // this is for leave part  
        Route::get('/admin/leave/list', 'App\Http\Controllers\leave@listing');
        Route::get('/admin/leave/add', 'App\Http\Controllers\leave@add');
        Route::post('admin/leave/submit', 'App\Http\Controllers\leave@submit');
        Route::get('admin/leave/delete/{id}', 'App\Http\Controllers\leave@delete');
        Route::get('admin/leave/edit/{id}', 'App\Http\Controllers\leave@edit');
        Route::post('admin/leave/update/{id}', 'App\Http\Controllers\leave@update');
});
