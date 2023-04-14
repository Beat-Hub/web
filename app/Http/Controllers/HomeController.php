<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function update_profile(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->age = $request->input('age');
        $user->city = $request->input('city');
        $user->school = $request->input('school');

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $image_name);
            $path = public_path('images/' . $image_name);
            $user->image = $image_name;
        }

        $user->save();

        return redirect()->route('edit');
    }



}
