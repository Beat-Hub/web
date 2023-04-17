<?php

namespace App\Http\Controllers;

use App\Models\Beat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BeatController extends Controller
{
    public function index()
    {
        $beats = Beat::all();
        return view('index', compact('beats'));
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
            return back()->withErrors($validator)->withInput();        }

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


}
