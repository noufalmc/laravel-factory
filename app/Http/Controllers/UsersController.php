<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function loginhome()
    {
        return view('login/login');
    }
    public function doLogin()
    {
        $input = array('email'=>request('email'),'password'=>request('password'));
        $flag=request('chk');
        if($flag=='')
        {
            $flag&=false;
        }
        if(auth()->attempt($input,$flag))
        {
            return redirect()->route('student.home');
        }
        else
        {
            return redirect()->route('login.home')->with('message','Invalid Credentials');
        }
    }
    public function logout()
{
    auth()->logout();
    return redirect()->route('login.home');
}
}
