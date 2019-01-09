<?php

namespace App\Http\Controllers;

use App\user_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class login_c extends Controller
{
    //function for data authentication

    public  function login(Request $request){
        //get data from login form
        $password = input::get('password');
        $username = input::get('username');

        //check  are empty or not

        if( $password === ""  or $username === ""){
            //return with error message

            return redirect::to('login_pg')->with('messages','Please make sure that all fields are filled');
        }else{
            //procceed to authentication
            $users = new user_data;

            $user_data = $users->where('USERNAME','=',$username,'AND','PASSWORD','=',$password)->get();

            //count the returned lines
            $count_users = $users->where('USERNAME','=',$username,'AND','PASSWORD','=',$password)->count();

            //check count var

            if($count_users === 0){
                //return back with error message
                return redirect::to('login_pg')->with('messages',"The account dosen't exists");
            }elseif($count_users > 1){
                //send a  mesage to admin with all the necessary data
            }elseif($count_users === 1){
                //double check the data again for any outside logic
                //dont trust the standard validation
                foreach ($user_data as $key){
                    if($key->USERNAME === $username and $key->PASSWORD === $password){
                        switch($key->ROLI){
                            case 'admin':
                                $user = $username;
                                 return redirect::to('admin_pg');
                                 break;
                        }

                    }else{
                        //return to the login with error message
                        return redirect::to('login_pg')->with('messages',"The account dosen't exists");
                    }
                }
            }


        }

    }
}
