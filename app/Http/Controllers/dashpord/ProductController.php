<?php

namespace App\Http\Controllers\dashpord;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Prodact;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Requests\dashbord\Product_request;
use App\Models\Bnar;
use App\Models\Detail;

class ProductController extends Controller
{
    public function view_product()
    {
        // return $details=Prodact::with('details:details,prodact_id')->find(60);   /////// get details of product
        $brand = Brand::all();
        $prodact_brand = Prodact::with('brands:id,name')->get();

        return view('dashbord.addproduct', compact('brand', 'prodact_brand'));
    }
    public function create_product(Request $request)
    {
        $path = $request->image->store('images', 'public');
        $total = $request->price - $request->discount;
        $prodact = Prodact::create([
            'image' => $path,
            'name' => $request->name,
            'title' => $request->title,
            'price' => $request->price,
            'discount' => $total,
            'brand_id' => $request->brand_id,
        ]);

        $product_id = $prodact->id;

        for ($i = 0; $i < count($request->listOfDetails); $i++) {
            Detail::create([
                'details' => $request->listOfDetails[$i]['details'],
                'prodact_id' => $product_id,
            ]);
        }

        return redirect()
            ->back()
            ->with(['success' => 'insted product ']);
    }
    public function edit_product($id)
    {
        $detail = Detail::all();
        $prodact = Prodact::with('brands:id,name')->find($id);
        $brand = Brand::all();
        return view('dashbord.editproduct', compact('prodact', 'brand', 'detail'));
    }
    public function update_product(Request $request, $id)
    {
        /////////////////////          update prodact       ///////
        $prodact = Prodact::find($id);
        if ($request->image) {
            if (Storage::exists('public/' . $prodact->image));
            Storage::delete(['public', $prodact->image]);
        }

        $path = $request->image->store('images', 'public');

        $prodact->update([
            'image' => $path,
            'name' => $request->name,
            'title' => $request->title,
            'price' => $request->price,
            'discount' => $request->discount,
            'brand_id' => $request->brand_id,
        ]);
        /////// update   details_Prodact       /////////// 
        $Detail = Prodact::with('details:id,details,prodact_id')->find($id);
       return  $Detail->details ;
          
         for ($i = 0; $i < ($request->listOfDetails); $i++) {
            $Detail->update([
                
                'details' => $request->listOfDetails[$i]['details'],

            ]);

        }
        return redirect()
            ->back()
            ->with(['success' => 'Update product ']);
    }
    public function delete_product($id)
    {
        Prodact::destroy($id);
        return redirect()
            ->back()
            ->with(['success' => 'deleted product ']);
    }
    // public function respons()
    // {
    //     return Prodact::with('brands:id,name')->get();
    // }
}
