<?php

namespace App;

use App\Utilities\traits\Mediable;

class Issue extends Model
{
    use Mediable;

    protected $with = ['comments','media','user'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function record()
    {
        return $this->belongsTo(Record::class);
    }
}
