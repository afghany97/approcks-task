<?php

namespace App;

use App\Utilities\traits\Mediable;

class Comment extends Model
{
    use Mediable;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }
}