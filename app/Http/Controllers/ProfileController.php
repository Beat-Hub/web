<?php

namespace App\Http\Controllers;

use App\Models\Beat;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


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
        $beats = $user->beats;
        $data = [
            'beats' => $beats,
            'user' => $user
        ];
        return view('profile', $data);
    }
}
