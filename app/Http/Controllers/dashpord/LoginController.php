<?php

namespace App\Http\Controllers\dashpord;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashbord\login_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_admin()
    {
        return view('dashbord.login');
    }
    public function chek_login(login_request $request)
    { 
      return  $request ;

      if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
        return redirect()->intended('/view_product');
      }
      return back()->withInput($request->only('email'));
    }








    public function regester()
    {
      return  view('dashbord.regester');
    }
}
