<?php

namespace App\Http\Controllers;

use App\Jobs\ApiJob;
use App\Jobs\MixPlaylistCreate;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Playlist;
use App\Models\PlaylistTrack;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $tracks = Track::query()->with('album')->inRandomOrder()->limit(12)->get();
        $albums = Album::query()->with(['artist', 'tracks'])->inRandomOrder()->limit(4)->get();
        $artists = Artist::query()->limit(4)->get();
        return view('home', [
            'tracks' => $tracks,
            'albums' => $albums,
            'artists' => $artists

        ]);
    }

    public function api(Request $request)
    {
        ApiJob::dispatch($request->name);

        return redirect()->route('home');
    }

    public function search(Request $request)
    {
        $trackSearch = Track::query()->where('name', 'like', '%' . $request->search . '%')->get();
        $albumSearch = Album::query()->where('name', 'like', '%' . $request->search . '%')->get();
        $artistSearch = Artist::query()->where('name', 'like', '%' . $request->search . '%')->get();
        return view('track-search', [
            'trackSearch' => $trackSearch,
            'albumSearch' => $albumSearch,
            'artistSearch' => $artistSearch
        ]);
    }

    public function artistAdd()
    {
        return view('admin.artist-add');

    }

    public function mixPlaylist()
    {

        MixPlaylistCreate::dispatch();
        return redirect()->back();
    }

}
