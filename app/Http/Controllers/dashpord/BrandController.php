<?php

namespace App\Http\Controllers\dashpord;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashpord;
use App\Models\Brand;
use App\Models\Section;
use App\Http\Requests\dashbord\brand_request;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function view_brandes()
    {
         $Section= Section::all();
         $brand_section=  Brand::with('section:id,name')->get();

        return view('dashbord.addbrandes',compact('Section','brand_section'));
    }
    public function create_brand(brand_request $request)
    {   
         Brand::create([

            'name'=>$request->name , 
            'section_id'=>$request->section_id,

        ]);  

        return redirect()->back()->with(['success'=>'Insted Brand !....']);
        
    } 
    public function edit_brand(Request $request , $id)
    {

        $brand=Brand::with('section:id,name')->find($id);
            
        return view('dashbord.editbrand',compact('brand'));
    }
    public function update_brand(Request $request, $id)
    {
        $section=Brand::find($id);
        $section->update([

                'name'=>$request->name,
                'section_id'=>$request->section_id,
        ]);
        return redirect()->back()->with(['success'=>'Update Brand !....']);
    }
    public function delete_brand($id)
    {
        Brand::destroy($id);
        return redirect()->back()->with(['success'=>'deleted Brand !....']);

    }
    
     
}
