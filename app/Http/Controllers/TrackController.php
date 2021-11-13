<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $genres = Genre::query()->get();
        $albums = Album::query()->get();
        return view('admin.tracks.create', [
            'genres' => $genres,
            'albums' => $albums
        ]);
    }

    public function store(Request $request)
    {
        $track = Track::query()->create([
            'name' => $request->name,
            'genre_id' => $request->genre_id,
            'album_id' => $request->album_id,
            'lyric' => $request->lyric
        ]);
        return redirect()->back();
    }

    public function show($trackId)
    {
        $track = Track::query()->with('album')->where('id', $trackId)->first();
        return view('track-show', [
            'track' => $track
        ]);

    }

}
