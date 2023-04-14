<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfileController
{
    /**
     * Returns profile view
     *
     * @return View
     */
    public function profile(): View
    {
        $user = auth()->user();
        return view('profile', ['user' => $user]);
    }
}
