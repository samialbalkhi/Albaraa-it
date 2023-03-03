<?php

namespace App\Http\Controllers\Declarativesite;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Prodact;
use App\Models\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function view_home()
    {
       $Prodact=Prodact::all();
        return view('Declarativesite.home',compact('Prodact'));
    }
    public function view_product()
    {
        $Section=Section::all();
       $Prodact=Prodact::all();
       $brand_section= Section::with('brands:name,id,section_id')->get();
   
        return view('Declarativesite.prodact',compact('Section','Prodact','brand_section'));
    }
    public function response()
    {
        return Section::with('brands:name,id,section_id')->get();
    }

}
