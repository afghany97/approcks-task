<?php

namespace App;

use App\Utilities\traits\Mediable;

class Comment extends Model
{
    use Mediable;

    protected $with = ['user','media'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}