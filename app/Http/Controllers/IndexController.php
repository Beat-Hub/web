<?php

namespace App\Http\Controllers;

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
}
