<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    function adminLoginForm()
    {
        
        return view('auth.admin_login');

    }

    function adminLogin(Request $request)
    {
    //   dd($request->all());
        $request->validate([
                'email' => 'required',
                'password' => 'required',  
            ] );
        if(Auth::guard('admin')->attempt(['email'=> $request->email,'password'=> $request->password])){
             return redirect('/admin/Dashboard');
            // dd('ok');
        }else{
            Session::flash('error-sms', 'Invalid Email or Password');
            return redirect()->back();
        }
       
    }
}
