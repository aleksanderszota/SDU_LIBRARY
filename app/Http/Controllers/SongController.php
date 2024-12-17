<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function import(Request $request)
    {
        $songs = $request->input('songs');

        foreach ($songs as $song) {
            Song::updateOrCreate(
                ['url' => $song['url']], // Unikalny klucz (np. ścieżka pliku)
                [
                    'name' => $song['name'],
                    'favorite' => $song['favorite'],
                ]
            );
        }

        return response()->json(['message' => 'Songs imported successfully!'], 200);
    }
}
