<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    public const STATE_ACTIVE = 1;
    public const STATE_INACTIVE = 0;

    protected $guarded = [];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeActive($query): Builder
    {
        return $query->whereState(self::STATE_ACTIVE);
    }
}
