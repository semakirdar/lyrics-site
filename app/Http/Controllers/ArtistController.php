<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function create()
    {
        return view('admin.artist');

    }

    public function store(request $request)
    {
        $artist = Artist::query()->create([
            'name' => $request->name,
            'bio' => $request->bio,
            'country' => $request->country
        ]);

        return redirect()->back();
    }
}
