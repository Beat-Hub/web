<?php

namespace App\Http\Controllers;

use App\Models\Beat;
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
        $beats = Beat::all();
        $users = User::all();
        $data = [
            'beats' => $beats,
            'users' => $users
        ];
        return view('index', $data);
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $request->validate([
            'age' => 'nullable|numeric|min:5|max:100'

        ]);

        $user = User::findOrFail($request->id);
        $user->email = $request->input('email');
        $user->age = $request->input('age');
        $user->city = $request->input('city');
        $user->school = $request->input('school');
        $user->description = $request->input('description');

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
