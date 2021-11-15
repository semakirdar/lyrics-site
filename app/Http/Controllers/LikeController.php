<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Track;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, $trackId)
    {
        $like = Like::query()
            ->where('track_id', $trackId)
            ->where('user_id', auth()->user()->id)->first();
        if ($like) {
            $like->delete();
        } else {
            Like::query()->create([
                'user_id' => auth()->user()->id,
                'track_id' => $trackId
            ]);
        }
        return redirect()->back();
    }

    public function likedSongs()
    {
        $likes = Like::query()->with('track')->where('user_id', auth()->user()->id)->get();

        return view('liked-songs', [
            'likes' => $likes
        ]);
    }
}
