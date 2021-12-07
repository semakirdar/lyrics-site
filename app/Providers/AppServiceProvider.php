<?php

namespace App\Providers;

use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
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
    public function boot(Guard $auth)
    {
        view()->composer('*', function($view) use ($auth) {
            if($auth->check()){
                $playlists = Playlist::query()
                    ->where('user_id', $auth->user()->id)
                    ->with('tracks')
                    ->get();

                $view->with('playlists', $playlists);
            }
        });
    }
}
