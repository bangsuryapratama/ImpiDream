<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'marketplace_provider',
    'product_name',
    'category',
    'price',
    'product_url',
    'image_url',
    'is_active',
    'price_updated_at',
])]
class MarketplaceProduct extends Model
{
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_active' => 'boolean',
            'price_updated_at' => 'datetime',
        ];
    }

    /**
     * Get all dreams that reference this product.
     */
    public function dreams(): HasMany
    {
        return $this->hasMany(Dream::class);
    }
}
