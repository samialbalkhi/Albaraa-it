<?php

namespace App\Http\Controllers\dashpord;

use App\Models\Bnar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\dashbord\BnarsRecuest;

class BanersController extends Controller
{
    public function view_bnars()
    {
        $banr = Bnar::get();
        return view('dashbord.baners', compact('banr'));
    }
    public function create_bnars(BnarsRecuest $request)
    {
        for ($i = 0; $i < count($request->image); $i++) {
            # code...qecog
            
            $path = $request->image[$i]->store('images_banres', 'public');
            
            Bnar::create([
                'image' => $path,
            ]);
        }

        // for($i=1 ; $i<count($request->image); $i++){

        return redirect()
            ->back()
            ->with(['success' => 'Insted image !....']);
    }
    public function edit_bnars(Request $request, $id)
    {
        $banars = Bnar::get()->find($id);
        return view('dashbord.editbaner', compact('banars'));
    }
    public function update_bnars(BnarsRecuest $request, $id)
    {
        $banars = Bnar::get()->find($id);
        // if ($request->image) {
            if (Storage::exists('public/' . $banars->image)) 
                Storage::delete('public/'. $banars->image);
            
        // }
        $path = $request->image->store('images_banres', 'public');

        $banars->update([
            'image' => $path,
        ]);
        return redirect()
            ->back()
            ->with(['success' => 'Update product ']);
    }
    public function delete_bnars(Request $request, $id)
    {
        Bnar::destroy($id);

        return redirect()
            ->back()
            ->with(['success' => 'Deleted product ']);
    }
}
