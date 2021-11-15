<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, $trackId)
    {
        $like = Like::query()->create([
            'user_id' => auth()->user()->id,
            'track_id' => $trackId
        ]);
        return redirect()->back();

    }
}
