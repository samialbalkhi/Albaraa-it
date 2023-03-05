<?php

namespace App\Http\Controllers\dashpord;

use App\Models\Profile;
use Illuminate\Http\Request;
use GuzzleHttp\Handler\Proxy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
        $profail = Profile::find($id);
        $profail = Profile::select('id', 'image_profile', 'text_About', 'image', 'text_mission', 'text_vision')->find($id);

        return view('dashbord.EditAbuotUs', compact('profail'));
    }
    public function update_profile(Request $request, $id)
    {
        $profail = Profile::find($id);
        if ($request->image) {

            if (Storage::exists('public/' . $profail->image) && ('public/' . $profail->image_profile));
            Storage::delete(['public', $profail->image] && (['public', $profail->image_profile]));
        }
        $path = $request->image->store('image', 'public');
        $path_profile = $request->image_profile->store('images_profile', 'public');

        $profail->update([

            'image_profile' => $path_profile,
            'text_About' => $request->text_About,
            'image' => $path,
            'text_mission' => $request->text_mission,
            'text_vision' => $request->text_vision
        ]);

        return redirect()->back()->with(['success' => 'Items the profile updated successfully']);
    }
    public function delete_profile($id)
    {
        Profile::destroy($id);

        return redirect()->back()->with(['success' => 'Items the profile deleted successfully']);
    }
    public function get_profile()
    {
        
    }
}
