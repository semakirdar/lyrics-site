<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class playlistController extends Controller
{
    public function create()
    {
        $playlist = Playlist::query()->create([

        ]);
    }
}
