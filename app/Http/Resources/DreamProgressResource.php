<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DreamProgressResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'dream_id' => $this->dream_id,
            'wallet_id' => $this->wallet_id,
            'amount' => (float) $this->amount,
            'formatted_amount' => 'Rp ' . number_format($this->amount, 0, ',', '.'),
            'note' => $this->note,
            'recorded_at' => $this->recorded_at ? $this->recorded_at->toIso8601String() : $this->created_at?->toIso8601String(),
        ];
    }
}
