<?php

namespace App\Http\Controllers\dashpord;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Prodact;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ProductController extends Controller
{
    public function view_product()
    {
         $brand=Brand::all();
         $prodact_brand= Prodact::with('brands:id,name')->get();
            return view('dashbord.addproduct',compact('brand','prodact_brand'));
    }
    public function create_product(Request $request)
    {
        $path=$request->image->store('images','public');
        Prodact::create([

                'image'=>$path,
                'name'=>$request->name,
                'title'=>$request->title,
                'list_of_details'=>$request->list,
                'price'=>$request->price,
                'discount'=>$request->discount,
                'brand_id'=>$request->brand_id,
        ]);
        return redirect()->back()->with(['success'=>'insted product ']);
    }
    
}
