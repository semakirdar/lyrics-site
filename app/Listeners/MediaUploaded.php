<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Intervention\Image\Facades\Image;
use Spatie\MediaLibrary\MediaCollections\Events\MediaHasBeenAdded;

class MediaUploaded
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(MediaHasBeenAdded $event)
    {
        $path = $event->media->getPath();
        $img = Image::make($path);
        $img->resize(500, 500);
        $img->save($path);
    }
}
