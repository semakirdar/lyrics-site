<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::query()->get();
        return view('admin.artists.index', [
            'artists' => $artists
        ]);
    }

    public function create()
    {
        return view('admin.artists.create');

    }

    public function store(request $request)
    {
        $artist = Artist::query()->create([
            'name' => $request->name,
            'bio' => $request->bio,
            'country' => $request->country
        ]);
        $artist->addMediaFromRequest('image')->toMediaCollection();

        return redirect()->back();
    }

    public function edit($id)
    {
        $artist = Artist::query()->where('id', $id)->first();
        return view('admin.artists.edit', [
            'artist' => $artist
        ]);
    }

    public function update($id, Request $request)
    {
        $artist = Artist::query()->where('id', $id)->first();
        $artist->update([
            'name' => $request->name,
            'bio' => $request->bio,
            'country' => $request->country
        ]);

        if ($request->has('image') && !empty($request->image)) {
            $media = $artist->getFirstMedia();
            if ($media)
                $media->delete();
            $artist->addMediaFromRequest('image')->toMediaCollection();
        }
        return redirect()->route('admin.artists.index');
    }


}
