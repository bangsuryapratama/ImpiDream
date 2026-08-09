<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'dream_id' => $this->dream_id,
            'name' => $this->name,
            'provider' => $this->provider,
            'balance' => (float) $this->balance,
            'formatted_balance' => 'Rp ' . number_format($this->balance, 0, ',', '.'),
            'is_active' => (bool) $this->is_active,
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
