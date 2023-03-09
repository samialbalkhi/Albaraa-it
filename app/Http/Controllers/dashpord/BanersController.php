<?php

namespace App\Http\Controllers\dashpord;

use App\Models\Bnar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BanersController extends Controller
{
    public function view_bnars()
    {
        $banr = Bnar::get();
        return view('dashbord.baners', compact('banr'));
    }
    public function create_bnars(Request $request)
    {
        $path = $request->image->store('images', 'public');
        Bnar::create([
            'image' => $path,
        ]);

        return redirect()
            ->back()
            ->with(['success' => 'Insted image !....']);
    }
    public function edit_bnars(Request $request, $id)
    {
        $banars = Bnar::get()->find($id);
        return view('dashbord.editbaner', compact('banars'));
    }
    public function update_bnars(Request $request, $id)
    {
        $banars = Bnar::get()->find($id);
        if ($request->image) {
            if (Storage::exists('public/' . $banars->image)) {
                Storage::delete(['public', $banars->image]);
            }
        }
        $path = $request->image->store('images', 'public');

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
