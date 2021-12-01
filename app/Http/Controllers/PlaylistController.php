<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\PlaylistTrack;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function create()
    {
        return view('playlist-create');
    }

    public function store(Request $request)
    {
        $playList = Playlist::query()->create([
            'name' => $request->name,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('home');
    }

    public function trackAdd(Request $request)
    {
        $playlistTrack = PlaylistTrack::query()->create([
            'track_id' => $request->track_id,
            'playlist_id' => $request->playlist_id,
            'sort_order' => 0
        ]);

        return redirect()->back();

    }

}
