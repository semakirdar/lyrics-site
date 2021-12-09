<?php

namespace App\Jobs;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class ApiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $artist;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($artist)
    {
        $this->artist = $artist;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $baseUrl = 'http://ws.audioscrobbler.com/2.0/';
        $apiKey = env('LASTFM_APIKEY');

        $artists = [
            $this->artist
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
}
