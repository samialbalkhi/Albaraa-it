<?php

namespace App\Http\Controllers\dashpord;

use App\Models\Detail;
use App\Models\Prodact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    public function edit_detail(Request $request)
    {
       
        

        $detals=DB::table('details')->where('id',$request->id)->select('id','details')->first()->details;
        return response()->json(['data' => $detals]);
    }
    public function update_detail($id)
    {
       
        
       $update_detals = Detail::find($id);
      
       $update_detals->update([

        'details'=>request()->details,
       ]);

    //    return ;
    }   
}
