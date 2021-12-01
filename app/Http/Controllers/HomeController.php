<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $tracks = Track::query()->with('album')->inRandomOrder()->limit(12)->get();
        $albums = Album::query()->with(['artist', 'tracks'])->orderBy('id', 'DESC')->limit(4)->get();
        return view('home', [
            'tracks' => $tracks,
            'albums' => $albums

        ]);
    }

    public function api()
    {
        $baseUrl = 'http://ws.audioscrobbler.com/2.0/';
        $apiKey = '32fc165a39ae9fe72a226f3430553c73';

        $artists = [
            'Adamlar',
            'Yüzyüzeyken Konuşuruz',
            'Son Feci Bisiklet',
            'Yaşlı Amca',
            'Dolu Kadehi Ters Tut',
        ];

        foreach ($artists as $artist) {
            $artistDb = Artist::query()->create([
                'name' => $artist,
                'bio' => $artist,
                'country' => 'Turkey'
            ]);

            $response = Http::get($baseUrl . '?method=artist.getTopAlbums&artist=' . $artist . '&api_key=' . $apiKey . '&format=json&limit=5');
            $response = $response->json();

            foreach ($response['topalbums']['album'] as $album) {
                $albumDb = Album::query()->create([
                    'name' => $album['name'],
                    'artist_id' => $artistDb->id,
                    'record_label_id' => 1,
                    'description' => $album['name'],
                    'is_single' => false,
                    'release_year' => 2021
                ]);
                // /2.0/?method=album.getinfo&api_key=YOUR_API_KEY&artist=Cher&album=Believe&format=json
                $responseTrack = Http::get($baseUrl . '?method=album.getinfo&api_key=' . $apiKey . '&artist=' . $artist . '&album=' . $album['name'] . '&format=json');
                $responseTrack = $responseTrack->json();
                if (isset($responseTrack['album']['tracks'])) {
                    if (!isset($responseTrack['album']['tracks']['track']['name'])) {
                        foreach ($responseTrack['album']['tracks']['track'] as $track) {
                            $trackDb = Track::query()->create([
                                'album_id' => $albumDb->id,
                                'genre_id' => 2,
                                'name' => $track['name'],
                                'lyric' => $track['name']
                            ]);
                        }
                    } else {
                        $trackDb = Track::query()->create([
                            'album_id' => $albumDb->id,
                            'genre_id' => 2,
                            'name' => $responseTrack['album']['tracks']['track']['name'],
                            'lyric' => $responseTrack['album']['tracks']['track']['name']
                        ]);
                    }
                }

                if (isset($album['image'][3]['#text']) && !empty($album['image'][3]['#text'])) {
                    $albumDb->addMediaFromUrl($album['image'][3]['#text'])->toMediaCollection();
                }
            }
        }
    }

    public function playlist()
    {

    }

    public function playlistStore(Request $request)
    {
        $playList = Playlist::query()->create([
            'name' => $request->name,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('home');
    }

}
