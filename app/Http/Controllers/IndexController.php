<?php

namespace App\Http\Controllers;

use App\Models\Beat;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Returns index view
     *
     * @return View
     */
    public function view(): View
    {
        return view('index');
    }
    public function index()
    {
        $beats = Beat::limit(10)->get();

        $data = [
            'beats' => $beats,
        ];
        return view('index', $data);
    }
}
