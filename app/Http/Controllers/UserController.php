<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function index()
    {
        return view('users');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function edit(): \Illuminate\View\View
    {
        $user = auth()->user();
        return view('edit', ['user' => $user]);
    }
    public function upload_beat(): \Illuminate\View\View
    {
        $user = \auth()->user();
        return view('upload_beat',['user' =>$user]);
    }

}
