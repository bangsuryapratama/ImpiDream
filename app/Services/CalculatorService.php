<?php

namespace App\Services;

use App\Models\Dream;
use Carbon\Carbon;

class CalculatorService
{
    /**
     * Calculate precision metrics for a Dream.
     *
     * @param Dream $dream
     * @return array
     */
    public function calculateMetrics(Dream $dream): array
    {
        $targetAmount = (float) $dream->target_amount;
        $currentAmount = (float) $dream->current_amount;
        $remainingAmount = max(0, $targetAmount - $currentAmount);

        $percentage = $targetAmount > 0 
            ? min(100.0, round(($currentAmount / $targetAmount) * 100, 1)) 
            : 0.0;

        $today = Carbon::today();
        $targetDate = $dream->target_date ? Carbon::parse($dream->target_date)->startOfDay() : $today;

        $isOverdue = $targetDate->isPast() && $currentAmount < $targetAmount;
        $isCompleted = $currentAmount >= $targetAmount;

        if ($isCompleted) {
            return [
                'remaining_amount' => 0,
                'remaining_days' => 0,
                'daily_target' => 0,
                'monthly_target' => 0,
                'percentage' => 100.0,
                'is_overdue' => false,
                'is_completed' => true,
            ];
        }

        $remainingDays = max(1, $today->diffInDays($targetDate, false));
        if ($remainingDays <= 0) {
            $remainingDays = 1;
        }

        $dailyTarget = (int) ceil($remainingAmount / $remainingDays);

        $remainingMonths = max(1, round($remainingDays / 30, 1));
        $monthlyTarget = (int) ceil($remainingAmount / $remainingMonths);

        return [
            'remaining_amount' => (float) $remainingAmount,
            'remaining_days' => (int) $remainingDays,
            'daily_target' => $dailyTarget,
            'monthly_target' => $monthlyTarget,
            'percentage' => $percentage,
            'is_overdue' => $isOverdue,
            'is_completed' => false,
        ];
    }
}
