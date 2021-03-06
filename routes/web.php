<?php
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

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
Route::get('login_pg', function () {
    return view('login.index');
});


//login auth
Route::POST('login', 'login_c@login');

//admin panel
Route::get('admin_pg', function () {
    //check session

    $session = Session::get('admin');
    if (!empty($session)) {
        return view('admin.panel');
    } else {
        return redirect::to('login_pg')->with('messages', 'Please login in order to access the system');
    }

});

//log out rout
Route::get('logout',function (){
    session()->flush();
    return redirect('login_pg')->with('messages','You are logout sucessfully');
});

//supermarket route
Route::get('supermarket',function(){

     $session = Session::get('admin');
    if (!empty($session)) {
        return view('admin.supermarket');
    } else {
        return redirect::to('login_pg')->with('messages', 'Please login in order to access the system');
    }
    
});
//add user route
Route::get('user_add',function(){
     $session = Session::get('admin');
     if (!empty($session)) {
         return view('regist_usr');
    } else {
        return redirect::to('login_pg')->with('messages', 'Please login in order to access the system');
    }

});

//upload user route
Route::POST('upload','regist_user@add_user');


