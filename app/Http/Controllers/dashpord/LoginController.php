<?php

namespace App\Http\Controllers\dashpord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_admin()
    {
        return view('dashbord.login');
    }

    public function regester()
    {
      return  view('dashbord.regester');
    }
}
