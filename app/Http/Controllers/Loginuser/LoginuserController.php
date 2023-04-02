<?php

namespace App\Http\Controllers\Loginuser;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Login\LoginRequest;
use App\Http\Requests\Login\SiginRequest;

class LoginuserController extends Controller
{
    public function index()
    {
        return view('loginuser.login');
    }

    public function register(){

        return view('loginuser.regester');
    }
    public function  create(LoginRequest $request)
    {
        User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('home_sa');
    }
    public function checkemail(SiginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // The user is being remembered...
            return redirect()->route('home_sa');
        }else

        return redirect()->back()->with(['message'=>'your message,here']);
    
    }
}
