<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function tracks()
    {
        return $this->belongsToMany(Track::class, 'playlist_tracks');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function getUserPlaylists()
    {
        if(Auth::check()){
            return Playlist::query()
                ->where('user_id', auth()->user()->id)
                ->with('tracks')
                ->get();
        }
    }
}
