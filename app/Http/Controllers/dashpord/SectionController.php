<?php

namespace App\Http\Controllers\dashpord;

use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Models\Section;
use Illuminate\Http\Request;

use App\Http\Requests\Section_request;

class SectionController extends Controller
{
    public function view_section()
    {
        $sections=Section::all();
        return view('dashbord.addsection',compact('sections'));
    }
    public function createsection(Section_request $request)
    {
       
        
        Section::create([

            'name'=>$request->name ,
            
        ]);

        return redirect()->back()->with(['success'=>'Insted Section !....']);
        
    }
    public function edit_section(Request $request ,$id)
    {
        $section=Section::find($id);
        
        $section=Section::select('id','name')->find($id);
      
        return view('dashbord.edit',compact('section'));
        
    }
    public function update(Section_request $request, $id)
    {
       
       $Section= Section::find($id);
       

      $Section -> update([

                'name'=>$request->name,
        
        ]);
        
        return redirect()->back()->with(['success'=>'Update Section !....']);
    }
    public function delete_section($id)
    {
        Section::destroy($id);
        return redirect()->back()->with(['success'=>'deleted Section !....']);
    }
}