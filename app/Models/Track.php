<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id',
        'name',
        'lyric',
        'genre_id'
    ];

    protected $appends = [
        'is_liked'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);

    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);

    }

    public function getIsLikedAttribute()
    {
        $like = Like::query()
            ->where('user_id', auth()->user()->id)
            ->where('track_id', $this->id)
            ->first();

        return $like ? true : false;
    }


}
