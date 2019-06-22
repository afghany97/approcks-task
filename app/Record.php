<?php

namespace App;

class Record extends Model
{
    protected $with = ['issues'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
