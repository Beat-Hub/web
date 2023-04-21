<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\Beat;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class BeatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function add_beat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'beat_name' => 'required|string|max:255',
            'bpm' => 'required|numeric',
            'genre' => 'required|string',
            'price_mp3' => 'nullable|required_with:mp3_file|numeric',
            'price_wav' => 'nullable|required_with:wav_file|numeric',
            'mp3_file' => 'nullable|required_with:price_mp3|mimes:mp3|max:100000000',
            'wav_file' => 'nullable|required_with:price_wav|mimes:wav|max:100000000',
        ], [
            'required' => 'The :attribute field is required.',
            'required_with' => 'The :attribute field is required when :values is present.',
            'mimes' => 'The :attribute must be a file of type: :values.',
            'max' => 'The :attribute may not be greater than :max kilobytes.',
            'numeric' => 'The :attribute must be a number.',
            'string' => 'The :attribute must be a string.',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (!$request->hasFile('mp3_file') && !$request->hasFile('wav_file')) {
            return back()->withErrors(['mp3_file' => 'You must submit at least one MP3 or WAV file.'])->withInput();
        }

        $beat = new Beat();
        $beat->beat_name = $request->input('beat_name');
        $beat->bpm = $request->input('bpm');
        $beat->genre = $request->input('genre');
        $beat->price_mp3 = $request->input('price_mp3');
        $beat->price_wav = $request->input('price_wav');

        if ($request->hasFile('mp3_file')) {
            $validator = Validator::make($request->all(), [
                'mp3_file' => 'mimes:mp3|max:100000000',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $mp3_file_name = time() . '_' . $request->file('mp3_file')->getClientOriginalName();
            $path = $request->file('mp3_file')->storeAs('public/mp3_files', $mp3_file_name);

            // Guardo el nombre del archivo en la bdd
            $beat->mp3_file = $mp3_file_name;
        }

        if ($request->hasFile('wav_file')) {
            $validator = Validator::make($request->all(), [
                'wav_file' => 'mimes:wav|max:100000000',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $wav_file_name = time() . '_' . $request->file('wav_file')->getClientOriginalName();
            $path = $request->file('wav_file')->storeAs('public/wav_files', $wav_file_name);

            // Guardo el nombre del archivo en la bdd
            $beat->wav_file = $wav_file_name;
        }

        $beat->user_id = auth()->user()->id;
        $beat->save();

        return redirect()->route('upload_beat')->with('success', 'Beat added successfully');

    }
    public function update_beat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'beat_name' => 'required|string|max:255',
            'bpm' => 'required|numeric',
            'genre' => 'required|string',
            'price_mp3' => 'nullable|numeric',
            'price_wav' => 'nullable|numeric',
        ], [
            'required' => 'The :attribute field is required.',
            'numeric' => 'The :attribute must be a number.',
            'string' => 'The :attribute must be a string.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $beat = Beat::findOrFail($request->id);
        $beat->beat_name = $request->input('beat_name');
        $beat->bpm = $request->input('bpm');
        $beat->genre = $request->input('genre');
        if ($request->has('price_mp3')) {
            $beat->price_mp3 = $request->input('price_mp3');
        }

        if ($request->has('price_wav')) {
            $beat->price_wav = $request->input('price_wav');
        }

        $beat->user_id = auth()->user()->id;
        $beat->save();
        return redirect()->route('edit_beat', ['id' => $beat->id])->with('success', 'Beat edited successfully');
    }
    public function edit_beat($id)
    {
        try {
            $user = auth()->user();
            $beat = $user->beats()->findOrFail($id);

            // Si el beat existe, carga la view para editar
            return view('edit_beat', ['beat' => $beat, 'user' => $user]);

        } catch (ModelNotFoundException $exception) {
            // Si el beat no se encuentra, lanza una excepción personalizada
            return response()->view('errors.custom', ['message' => $exception->getMessage()], 500);
        }
    }
    public function delete_beat($id)
    {
        // Autenticación
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Obtener el beat a eliminar
        $beat = Beat::findOrFail($id);

        // Verificar si el beat pertenece al usuario actual
        if ($beat->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Eliminar el beat
        $beat->delete();

        // Registro de actividad
        activity()->log('Deleted beat ' . $beat->id);

        // Redirigir al usuario con mensaje de éxito
        return redirect()->route('profile', ['id' => $beat->id])->with('success', 'Beat deleted successfully');
    }
    public function like(Request $request, Beat $beat)
    {
        $beat->likes()->syncWithoutDetaching(auth()->user()->id);

        $likeCount = $beat->likes()->count();

        return response()->json([
            'likes' => $likeCount
        ]);
    }



}
