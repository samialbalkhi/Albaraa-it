<?php

namespace App\Http\Controllers\dashpord;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Profiler\Profiler;

class ProfileConroller extends Controller
{
    public function view_data()
    {
        $Profile = Profile::get();
        return view('dashbord.AboutUs', compact('Profile'));
    }
    public function create_profile(Request $request)
    {


        $path = $request->image->store('image', 'public');
        $path_profile = $request->image_profile->store('images_profile', 'public');



        Profile::create([

            'image_profile' => $path_profile,
            'text_About' => $request->text_About,
            'image' => $path,
            'text_mission' => $request->text_mission,
            'text_vision' => $request->text_vision

        ]);
        return redirect()->back()->with(['success' => 'insted product ']);
    }
    public function edit_profile($id)
    {
        return $id ;
     }
}
