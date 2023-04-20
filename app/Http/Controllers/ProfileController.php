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
        $mp3_wav_count = $user->countMp3AndWavFiles(); // cuenta el número total de archivos MP3 y WAV del usuario

        $data = [
            'beats' => $beats,
            'user' => $user,
            'mp3_wav_count' => $mp3_wav_count

        ];
        return view('profile', $data);
    }

}
