<?php

namespace App\Http\Controllers\dashpord;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Prodact;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Requests\dashbord\Product_request;


class ProductController extends Controller
{
    public function view_product()
    {
         $brand=Brand::all();
         $prodact_brand= Prodact::with('brands:id,name')->get();
         
            return view('dashbord.addproduct',compact('brand','prodact_brand'));
    }
    public function create_product(Product_request $request)
    {
        
        $path=$request->image->store('images','public');
        $total=$request->price - $request->discount ;
        Prodact::create([

                'image'=>$path,
                'name'=>$request->name,
                'title'=>$request->title,
                'list_of_details'=>$request->list_of_details,
                'price'=>$request->price,
                'discount'=>$total,
                'brand_id'=>$request->brand_id,
        ]);
        return redirect()->back()->with(['success'=>'insted product ']);
    }
    public function edit_product($id)
    {
        $prodact= Prodact::with('brands:id,name')->find($id);
        $brand=Brand::all();
        return view('dashbord.editproduct',compact('prodact','brand'));
    }
    public function update_product(Product_request $request, $id)
    {
        $prodact=Prodact::find($id);
        if($request->image){

            if(Storage::exists('public/' .$prodact->image));
                Storage::delete(['public',$prodact->image]);
        }
        
        $path=$request->image->store('images','public');

        $prodact->update([

            'image'=>$path,
            'name'=>$request->name,
            'title'=>$request->title,
            'list_of_details'=>$request->list_of_details,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'brand_id'=>$request->brand_id,
            
        ]);

        return redirect()->back()->with(['success'=>'Update product ']);

    }   public function delete_product($id)
    {
        Prodact::destroy($id);
        return redirect()->back()->with(['success'=>'deleted product ']);
    }
    public function respons()
    {
        return Prodact::with('brands:id,name')->get();

    }
    
}
