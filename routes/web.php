<?php

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


//login view
Route::get('login_pg',function(){
    return view('login.index');
});


//login auth
Route::POST('login','login_c@login');

//admin panel
Route::get('admin_pg',function (){
    return view('admin.panel');
});
