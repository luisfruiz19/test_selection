<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{

    public const STATE_ACTIVE = 1;
    public const STATE_INACTIVE = 0;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query): Builder
    {
        return $query->whereState(self::STATE_ACTIVE);
    }
}
