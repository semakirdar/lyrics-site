<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\RecordLabel;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function create()
    {
        $records = RecordLabel::query()->get();
        $artists = Artist::query()->get();
        return view('admin.album', [
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

        return redirect()->back();
    }
}
