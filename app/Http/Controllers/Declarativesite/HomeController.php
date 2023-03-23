<?php

namespace App\Http\Controllers\Declarativesite;

use App\Models\Bnar;
use App\Models\Brand;
use App\Models\Detail;
use App\Models\Prodact;
use App\Models\Profile;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Imageprodcu;
use Symfony\Component\HttpKernel\Profiler\Profiler;

class HomeController extends Controller
{
    public function view_home()
    {
        $baners = Bnar::get();

        $Prodact_take=Prodact::with('imageprodcus:id,image,prodact_id')->orderBy('id', 'ASC')
            ->take(4)
            ->get();

        $Prodact =Prodact::with('imageprodcus:id,image,prodact_id')->latest()
            ->take(4)
            ->get();

        return view('Declarativesite.home', compact('Prodact', 'Prodact_take', 'baners'));
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
        return Brand::where('section_id', $request->section_id)->get();
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
        $prodact = Prodact::with('details:id,details,prodact_id')->find($id);
        $prodactimage = Prodact::with('imageprodcus:id,image,prodact_id')->find($id);

        return view('Declarativesite.InformationProducts', compact('prodact','prodactimage'));
    }

    public function get_section()
    {
        return Section::all();
    }

    public function get_prodcatId(Request $request)
    {
        return Prodact::where('brand_id')->get();
    }

    public function To_contact_us()
    {
        return view('Declarativesite.ToContactUs');
    }


    public function search(Request $request)
    {

        $search =$request['Search'] ?? "";

        if($search !=""){
            
           Prodact::where('name','=',"%$search%")->get();    
            
         
        }else{
           Prodact::all();

        return view('Declarativesite.search');
            
        }
        // $search_text=$_GET['search'];
        // $prodacts=Prodact::where('name','LIKE','%'.$search_text.'%')->get();

        // return view('Declarativesite.search');
    }

    public function get_products()
    {
        $Prodact =Prodact::with('imageprodcus:id,image,prodact_id')->latest()
        ->take(4)
        ->get();

           foreach($Prodact as $items){

         foreach($items as $asd)

         echo $asd ;
         
           }
}
}