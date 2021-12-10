<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Artist extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = [
        'name',
        'bio',
        'country'
    ];

    protected $appends = [
        'cover'
    ];

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    public function getCoverAttribute()
    {
        if (empty($this->getFirstMediaUrl())) {
            return asset('images/images.jpeg');
        } else {
            return $this->getFirstMediaUrl();
        }
    }

}
