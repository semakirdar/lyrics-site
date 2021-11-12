<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $albums = Album::query()->with('artist')->get();
        return view('home', [
            'albums' => $albums
        ]);
    }
}
