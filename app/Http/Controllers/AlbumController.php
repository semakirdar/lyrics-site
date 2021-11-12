<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\RecordLabel;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    public function index()
    {
        $albums = Album::query()->get();
        return view('admin.albums.index', [
            'albums' => $albums
        ]);
    }

    public function create()
    {
        $records = RecordLabel::query()->get();
        $artists = Artist::query()->get();
        return view('admin.albums.create', [
            'artists' => $artists,
            'records' => $records
        ]);
    }

    public function store(Request $request)
    {
        $album = Album::query()->create([
            'artist_id' => $request->artist_id,
            'name' => $request->name,
            'release_year' => $request->release_year,
            'description' => $request->description,
            'record_label_id' => $request->recordLabel_id,
            'is_single' => $request->has('is_single')

        ]);
        $album->addMediaFromRequest('image')->toMediaCollection();

        return redirect()->back();
    }

    public function edit($id)
    {
        $records = RecordLabel::query()->get();
        $artists = Artist::query()->get();
        $album = Album::query()->where('id', $id)->first();
        return view('admin.albums.edit', [
            'album' => $album,
            'records' => $records,
            'artists' => $artists

        ]);

    }

    public function update($id)
    {

    }
}
