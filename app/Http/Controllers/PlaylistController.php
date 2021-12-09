<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\PlaylistTrack;
use Illuminate\Http\Request;
use Illuminate\Testing\Fluent\Concerns\Has;

class PlaylistController extends Controller
{
    public function create()
    {
        return view('playlists.create');
    }

    public function store(Request $request)
    {
        $playList = Playlist::query()->create([
            'name' => $request->name,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('playlist.lists');
    }

    public function trackAdd(Request $request)
    {
        $exists = PlaylistTrack::query()
            ->where('track_id', $request->track_id)
            ->where('playlist_id', $request->playlist_id)
            ->exists();
        if (!$exists) {
            PlaylistTrack::query()->create([
                'track_id' => $request->track_id,
                'playlist_id' => $request->playlist_id,
                'sort_order' => 0
            ]);
        } else {
            return redirect()->back()->withErrors('this track already exists in your play list');
        }

        return redirect()->back()->with('success', 'this track successfully added to playlist');


    }

    public function show($playlistId)
    {
        $playlist = Playlist::query()->where('id', $playlistId)->with(['tracks', 'user'])->first();
        return view('playlists.show', [
            'playlist' => $playlist
        ]);
    }

    public function trackDelete($trackId)
    {
        $playlist = PlaylistTrack::query()->where('track_id', $trackId)->first();
        $playlist->delete();
        return redirect()->back()->with('success', 'track removed successfully form playlist');
    }

    public function index()
    {
        $myPlaylists = Playlist::query()->where('user_id', auth()->user()->id)->with(['tracks', 'user'])->get();
        return view('playlists.index', [
            'myPlaylists' => $myPlaylists
        ]);
    }

    public function playlistDelete($id)
    {
        $playlist = Playlist::query()->with('tracks')->where('id', $id)->first();
        $playlistTracks = PlaylistTrack::query()->where('playlist_id', $playlist->id)->get();
        foreach ($playlistTracks as $playlistTrack) {
            $playlistTrack->delete();
        }
        $playlist->delete();
        return redirect()->route('playlist.lists');
    }

    public function allPlaylist()
    {
        $playlists = Playlist::query()->paginate(2);
        return view('playlists.allPlaylists', [
            'playlists' => $playlists
        ]);
    }
}
