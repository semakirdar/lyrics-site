<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Album extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'artist_id',
        'release_year',
        'description',
        'record_label_id',
        'is_single',
        'name'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function recordLabel()
    {
        return $this->belongsTo(RecordLabel::class);
    }
}
