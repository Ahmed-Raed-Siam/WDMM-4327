<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Share extends Model
{
    use HasFactory;

    /**
     * @return MorphTo
     */
    public function shareable(): MorphTo
    {
        return $this->morphTo();
    }
}
