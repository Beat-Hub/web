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
        return view('profile');
    }
}
