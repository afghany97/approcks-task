<?php

namespace App;

use App\Utilities\traits\Mediable;

class Issue extends Model
{
    use Mediable;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
