<?php

namespace App\Livewire\Seller\Product;

use App\Models\Category;
use App\Services\StatsService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListProducts extends Component
{
    use WithPagination;

    public $totalProducts;
    public $totalActiveProducts;
    public $totalLowStockProducts;
    public $totalOutOfStockProducts;
    public $statusOptions = [
        ['id' => 'active', 'name' => 'Ativo'],
        ['id' => 'inactive', 'name' => 'Inativo'],
        ['id' => 'out_of_stock', 'name' => 'Esgotado'],
    ];

    public function mount(StatsService $statsService)
    {
        $stats = $statsService->getProductStats();

        $this->fill($stats);
    }


    #[On('product-created')]
    public function refreshTable(StatsService $stats)
    {
        $this->resetPage();

        $newStats = $stats->getProductStats();
        $this->fill($newStats);
    }


    public function getCategoriesProperty()
    {
        return Category::orderBy('name')->get();
    }


    public function render()
    {
        return view('livewire.seller.product.list-products', [
            'products' => Auth::user()->seller->products()->with('category')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
