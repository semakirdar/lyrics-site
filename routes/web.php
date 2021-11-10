<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\HomeController;
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
Route::get('/admin/album/create', [AlbumController::class, 'create'])->name('admin.album.create');
Route::post('/admin/album/store', [AlbumController::class, 'store'])->name('admin.album.store');
Route::get('/admin/artist/create', [ArtistController::class, 'create'])->name('admin.artist.create');
Route::post('/admin/artist/store', [ArtistController::class, 'store'])->name('admin.artist.store');
