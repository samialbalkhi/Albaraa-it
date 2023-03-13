<?php

namespace App\Http\Controllers\dashpord;

use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DetailsController extends Controller
{
    public function edit_detail(Request $request)
    {

        $detals = Detail::select('details')
            ->find($request->id)
            ->value('details');
        return response()->json(['data' => $detals]);
    }
    public function update_detail(Request $request)
    {
       $update_detals = Detail::find($request->id);
      
      $update= $update_detals->update([

        'details'=>$request->name,

       ]);

       return response()->json(['data'=> $update]);
    }
}
