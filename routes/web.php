<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\playlistController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TrackController;
use App\Models\Playlist;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//gEU%ckFZ$c7F
Route::middleware('auth')->group(function () {
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('/track/like/{trackId}', [LikeController::class, 'store'])->name('tracks.like');
    Route::get('/liked/songs', [LikeController::class, 'likedSongs'])->name('liked.songs');

    Route::get('/playlist/create', [PlaylistController::class, 'create'])->name('playlist.create');
    Route::post('/playlist/store', [PlaylistController::class, 'store'])->name('playlist.store');

    Route::post('/playlist/track/add', [PlaylistController::class, 'trackAdd'])->name('playlist.track.add');


    Route::middleware('admin')->group(function () {
        Route::get('/admin/albums/index', [AlbumController::class, 'index'])->name('admin.albums.index');
        Route::get('/admin/albums/create', [AlbumController::class, 'create'])->name('admin.albums.create');
        Route::post('/admin/albums/store', [AlbumController::class, 'store'])->name('admin.albums.store');
        Route::get('/admin/albums/{id}/edit', [AlbumController::class, 'edit'])->name('admin.albums.edit');
        Route::post('/admin/albums/{id}/update', [AlbumController::class, 'update'])->name('admin.albums.update');

        Route::get('/admin/artists/index', [ArtistController::class, 'index'])->name('admin.artists.index');
        Route::get('/admin/artists/create', [ArtistController::class, 'create'])->name('admin.artists.create');
        Route::post('/admin/artists/store', [ArtistController::class, 'store'])->name('admin.artists.store');
        Route::get('/admin/artists/{id}/edit', [ArtistController::class, 'edit'])->name('admin.artists.edit');
        Route::post('/admin/artists/{id}/update', [ArtistController::class, 'update'])->name('admin.artists.update');

        Route::get('/admin/tracks/create', [TrackController::class, 'create'])->name('admin.tracks.create');
        Route::post('/admin/tracks/store', [TrackController::class, 'store'])->name('admin.tracks.store');

    });
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{albumId}/albums/show', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/{trackId}/tracks/show', [TrackController::class, 'show'])->name('tracks.show');
Route::get('/{artistId}/artists/show', [ArtistController::class, 'show'])->name('artists.show');

Route::get('/playlist/{playlistId}/show', [PlaylistController::class, 'show'])->name('playlist.show');
Route::post('/playlist/{trackId}/delete', [PlaylistController::class, 'trackDelete'])->name('playlist.track.delete');
Route::get('/playlist/list', [PlaylistController::class, 'index'])->name('playlist.lists');
Route::post('/playlist/list/{id}/delete', [PlaylistController::class, 'playlistDelete'])->name('playlist.lists.delete');

Route::get('/api', [HomeController::class, 'api'])->name('api');



