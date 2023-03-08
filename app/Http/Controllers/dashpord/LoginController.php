<?php

namespace App\Http\Controllers\dashpord;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashbord\Login_request;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
 

  public function login_admin()
  {
    return view('dashbord.login');
  }
  public function chek_login(Login_request $request)
  {
          
    if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect()->intended('/view_product');
    }
  }
}
