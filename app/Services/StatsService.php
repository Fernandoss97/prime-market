<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class StatsService
{
    public function __construct()
    {
        //
    }

    /**
     * Get product statistics for the authenticated seller.
     *
     * @return array{totalProducts: int, totalActiveProducts: int, totalLowStockProducts: int, totalOutOfStockProducts: int}
     */
    public function getProductStats(): array
    {
        $totalProducts = Auth::user()->seller->products()->count();
        $totalActiveProducts = Auth::user()->seller->products()->where('is_active', true)->count();
        $totalLowStockProducts = Auth::user()->seller->products()->where('stock', '<', 10)->count();
        $totalOutOfStockProducts = Auth::user()->seller->products()->where('stock', 0)->count();

        return [
            'totalProducts' => $totalProducts,
            'totalActiveProducts' => $totalActiveProducts,
            'totalLowStockProducts' => $totalLowStockProducts,
            'totalOutOfStockProducts' => $totalOutOfStockProducts,
        ];
    }
}
