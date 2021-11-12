<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin/albums/index', [AlbumController::class, 'index'])->name('admin.albums.index');
Route::get('/admin/albums/create', [AlbumController::class, 'create'])->name('admin.albums.create');
Route::post('/admin/albums/store', [AlbumController::class, 'store'])->name('admin.albums.store');
Route::get('/admin/albums/{id}/edit', [AlbumController::class, 'edit'])->name('admin.albums.edit');
Route::post('/admin/albums/{id}/update', [AlbumController::class, 'update'])->name('admin.albums.update');
Route::get('/admin/{albumId}/albums/show', [AlbumController::class, 'show'])->name('admin.albums.show');

Route::get('/admin/artists/index', [ArtistController::class, 'index'])->name('admin.artists.index');
Route::get('/admin/artists/create', [ArtistController::class, 'create'])->name('admin.artists.create');
Route::post('/admin/artists/store', [ArtistController::class, 'store'])->name('admin.artists.store');
Route::get('/admin/artists/{id}/edit', [ArtistController::class, 'edit'])->name('admin.artists.edit');
Route::post('/admin/artists/{id}/update', [ArtistController::class, 'update'])->name('admin.artists.update');

Route::get('/admin/tracks/create', [TrackController::class, 'create'])->name('admin.tracks.create');
Route::post('/admin/tracks/store', [TrackController::class, 'store'])->name('admin.tracks.store');

