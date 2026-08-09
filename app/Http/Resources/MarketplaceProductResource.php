<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MarketplaceProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->product_name,
            'name' => $this->product_name,
            'product_name' => $this->product_name,
            'price' => (float) $this->price,
            'formatted_price' => 'Rp ' . number_format($this->price, 0, ',', '.'),
            'category' => $this->category,
            'marketplace_provider' => ucfirst($this->marketplace_provider),
            'product_url' => $this->product_url,
            'image_url' => $this->image_url ? asset($this->image_url) : null,
            'is_active' => (bool) $this->is_active,
        ];
    }
}
