<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageUploadRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\Console\Input\Input;

class UploadController extends Controller
{
    public function index(): View
    {
        return view('edit');
    }
    public function upload(ImageUploadRequest $request)
    {
        $user = auth()->user();

        if ($user) {
            // el usuario está autenticado, podemos actualizar su foto de perfil
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Storage::putFileAs('images', $avatar, $filename);
                $user->photo = $filename;
                $user->save();
            }
            return redirect()->back();
        } else {
            // el usuario no está autenticado, redirigir a la página de inicio de sesión
            return redirect()->route('login');
        }
    }

}

