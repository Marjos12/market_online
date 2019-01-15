<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\user;
use Illuminate\Support\Facades\Auth;

class regist_user extends Controller
{
	var $validation ;
    //validate data
    public function validate_data(Request $request){
    	$data = $request->all();
    	//build the validation rules
    	$rules = [
        'username'=>'alpha_num|min:6|max:15|required',
        'email'   =>'E-Mail|required',
        'emer_mb' =>'alpha|min:10|max:30|required',
        'gjinia'  =>'alpha_num|min:5|max:8|required',
        'qyteti'  =>'alpha|min:6|max:20|requried',
        'adres'   =>'alpha|min:6|max:30|required',
        'cel'     =>'integer|min:10|max:10|required',
        'tel'     =>'integer|min:9|max:12|required',
        'pass'    =>'alpha_num|min:6|max:15|required',
        're-pass' =>'alpha_num|min:6|max:15|required',
    	];

    	//run the validation
       $validation = make::validation($data,$rules);

       if($validation->passes()){
       	return $data;
       } else{
       return false;
       }
    }

    public function add_user(){
    	//call the session function
    	$session = $this->check_session();

    	if($session === false){
          return redirect::to('login_pg')->with('messages', 'Please login in order to access the system');
    	}

        //call the validation func
    	$data = $this->validate_data();

    	if($data === false){
          return redirect::to('user_add')->withError($validation);
    	}

    	//if session and validation are ok upload user
    	$user = new user_data();

    	//mapp fields from source to target
    	$user->USERNAME = $data->username;
    	$user->PASSWORD = $data->pass;
    	$user->EMER_MBIEMER = $data->emer_mb;
    	$user->GJINIA       = $data->gjinia;
    	$user->QYTETI       = $data->qyteti;
    	$user->adres        = $data->adres;
    	$user->CEL          = $data->cel;
    	$user->TEL          = $data->tel;
    	$user->EMAIL        = $data->email;
    	$user->ROLI         = "supermarket";
    	$user->CR_DATE      = date("Y-m-d");
    	$user->LAST_UPDATE  = date("Y-m-d");

    	$user->save();

    	if($user->passes()){
    		return redirect::to('user_add')->with('message','user registred succesfully');
    	} else {
    		return redirect::to('user_add')->with('message','Problem adding user');
    	}
    }



    public function check_session(){
     $session = Session::get('admin');
     if (!empty($session)) {
         return true;
    } else {
        return  false;
    }
    }
}
