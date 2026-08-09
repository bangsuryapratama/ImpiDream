<?php

namespace App\Http\Resources;

use App\Services\CalculatorService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DreamResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $calculator = app(CalculatorService::class);
        $metrics = $calculator->calculateMetrics($this->resource);

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'marketplace_product_id' => $this->marketplace_product_id,
            'name' => $this->name,
            'category' => $this->category,
            'target_amount' => (float) $this->target_amount,
            'current_amount' => (float) $this->current_amount,
            'formatted_target_amount' => 'Rp ' . number_format($this->target_amount, 0, ',', '.'),
            'formatted_current_amount' => 'Rp ' . number_format($this->current_amount, 0, ',', '.'),
            'percentage' => $metrics['percentage'],
            'target_date' => $this->target_date?->toDateString(),
            'status' => $this->status,
            'metrics' => [
                'remaining_amount' => $metrics['remaining_amount'],
                'formatted_remaining_amount' => 'Rp ' . number_format($metrics['remaining_amount'], 0, ',', '.'),
                'remaining_days' => $metrics['remaining_days'],
                'daily_target' => $metrics['daily_target'],
                'formatted_daily_target' => 'Rp ' . number_format($metrics['daily_target'], 0, ',', '.'),
                'monthly_target' => $metrics['monthly_target'],
                'formatted_monthly_target' => 'Rp ' . number_format($metrics['monthly_target'], 0, ',', '.'),
                'is_overdue' => $metrics['is_overdue'],
                'is_completed' => $metrics['is_completed'],
            ],
            'product_reference' => new MarketplaceProductResource($this->whenLoaded('marketplaceProduct')),
            'wallets' => WalletResource::collection($this->whenLoaded('wallets')),
            'recent_progress' => DreamProgressResource::collection($this->whenLoaded('progresses')),
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
