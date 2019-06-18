<?php

namespace App;

class Board extends Model
{
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

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
