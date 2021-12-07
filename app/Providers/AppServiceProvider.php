<?php

namespace App\Providers;

use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $playlists = Playlist::query()
            ->with('tracks')
            ->get();

        View::share([
            'playlists' => $playlists
        ]);
    }
}
