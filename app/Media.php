<?php

namespace App;

class Media extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */

    public function mediable()
    {
        return $this->morphTo();
    }

    /**
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeImages($query)
    {
        return $query->whereType('image');
    }

    /**
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeVideos($query)
    {
        return $query->whereType('video');
    }

    /**
     * @return string
     */

    public function fullPath()
    {
        return "/storage/" . $this->path;
    }
}
