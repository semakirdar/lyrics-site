<?php

namespace App\Jobs;

use App\Models\Playlist;
use App\Models\PlaylistTrack;
use App\Models\Track;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MixPlaylistCreate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        for ($number = 1; $number < 4; $number++) {
            $mixPlaylist = Playlist::query()->create([
                'name' => 'playlist' . $number,
                'user_id' => '1'
            ]);

            $tracks = Track::query()->inRandomOrder()->limit(10)->get();
            foreach ($tracks as $track) {
                if (isset($track)) {
                    PlaylistTrack::query()->create([
                        'track_id' => $track->id,
                        'playlist_id' => $mixPlaylist->id,
                        'sort_order' => 1
                    ]);
                }
            }
        }
    }
}
