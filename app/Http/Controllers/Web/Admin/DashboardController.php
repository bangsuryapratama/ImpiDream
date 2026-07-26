<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dream;
use App\Models\MarketplaceProduct;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with real platform statistics.
     */
    public function index(): View
    {
        $stats = [
            'total_users' => User::where('role', 'user')->count(),
            'total_dreams' => Dream::count(),
            'active_dreams' => Dream::where('status', 'active')->count(),
            'completed_dreams' => Dream::where('status', 'completed')->count(),
            'total_products' => MarketplaceProduct::count(),
            'outdated_products' => MarketplaceProduct::where('is_active', true)
                ->where(function ($query) {
                    $query->whereNull('price_updated_at')
                        ->orWhere('price_updated_at', '<', now()->subDays(30));
                })->count(),
        ];

        $recentUsers = User::where('role', 'user')
            ->latest()
            ->take(5)
            ->get();

        $recentDreams = Dream::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentUsers', 'recentDreams'));
    }
}
