<?php

namespace App\Http\Controllers\Declarativesite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function view_home()
    {
        return view('Declarativesite.home');
    }
}
