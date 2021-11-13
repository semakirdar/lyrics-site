<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tracks = Track::query()->with('album')->orderBy('name', 'ASC')->limit(12)->get();
        $albums = Album::query()->with(['artist', 'tracks'])->orderBy('id', 'DESC')->limit(5)->get();
        return view('home', [
            'tracks' => $tracks,
            'albums' => $albums

        ]);
    }
}
