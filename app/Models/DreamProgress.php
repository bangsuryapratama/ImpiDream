<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'dream_id',
    'wallet_id',
    'amount',
    'recorded_date',
    'note',
])]
class DreamProgress extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * Override karena Laravel auto-pluralize menjadi 'dream_progresses',
     * sedangkan tabel kita bernama 'dream_progress'.
     */
    protected $table = 'dream_progress';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'recorded_date' => 'date',
        ];
    }

    /**
     * Get the dream this progress entry belongs to.
     */
    public function dream(): BelongsTo
    {
        return $this->belongsTo(Dream::class);
    }

    /**
     * Get the wallet this progress was recorded through.
     */
    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
