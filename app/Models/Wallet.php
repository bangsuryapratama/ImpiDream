<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'dream_id',
    'user_id',
    'provider_type',
    'provider_status',
    'balance',
])]
class Wallet extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'balance' => 'decimal:2',
        ];
    }

    /**
     * Get the dream this wallet belongs to.
     */
    public function dream(): BelongsTo
    {
        return $this->belongsTo(Dream::class);
    }

    /**
     * Get the user that owns this wallet.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all progress entries recorded through this wallet.
     */
    public function progress(): HasMany
    {
        return $this->hasMany(DreamProgress::class);
    }
}
