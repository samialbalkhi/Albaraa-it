<?php

namespace App\Http\Controllers\Declarativesite;

use App\Models\Brand;
use App\Models\Prodact;
use App\Models\Profile;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Profiler\Profiler;

class HomeController extends Controller
{
    public function view_home()
    {
        $Prodact = Prodact::all();
        return view('Declarativesite.home', compact('Prodact'));
    }
    public function view_product()
    {
        $Section = Section::all();
        $Prodact = Prodact::all();
        $sections = Section::with('brands:name,id,section_id')->get();

        return view('Declarativesite.prodact', compact('Section', 'Prodact', 'sections'));
    }
    public function section_brand(Request $request)
    {

        return  Brand::where('section_id', $request->section_id)->get();
    }

    public function About_Us()
    {
        $profile = Profile::all();
        return view('Declarativesite.AboutUs', compact('profile'));
    }
    public function brand_products(Request $request)
    {

        return Prodact::where('brand_id', $request->brandId)->get();
    }
    public function information_products(Request $request, $id)
    {
        $prodact = Prodact::all()->find($id);
        return view('Declarativesite.InformationProducts', compact('prodact'));
    }

    public function get_section()
    {
            // sleep(3000);
        return Section::all();
    }

    public function get_prodcatId(Request $request)
    {
        return Prodact::where('brand_id')->get();
    }
}
