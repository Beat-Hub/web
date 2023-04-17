<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageUploadRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UploadController extends Controller
{
    public function index(): View
    {
        return view('upload');
    }
}

