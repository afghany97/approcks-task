<?php

namespace App\Utilities\traits;

use App\Media;

trait Mediable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */

    public function media()
    {
        return $this->morphMany(Media::class,'mediable');
    }

    /**
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */

    private function storeMedia(array $data)
    {
        return $this->media()->create($data);
    }

    /**
     * @param $path
     * @return \Illuminate\Database\Eloquent\Model
     */

    public function image($path)
    {
        return $this->storeMedia(['path' => $path, 'type' => 'image']);
    }

    /**
     * @param $path
     * @return \Illuminate\Database\Eloquent\Model
     */

    public function video($path)
    {
        return $this->storeMedia(['path' => $path, 'type' => 'video']);
    }

    /**
     * @return bool
     */

    public function hasImages()
    {
        return !! $this->media()->images()->count();
    }

    /**
     * @return bool
     */

    public function hasVideos()
    {
        return !! $this->media()->videos()->count();
    }
}