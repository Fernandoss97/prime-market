<?php

namespace App\Livewire\Seller\Product;

use App\Models\Category;
use App\Services\StatsService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ListProducts extends Component
{
    use WithPagination;

    public $totalProducts;
    public $totalActiveProducts;
    public $totalLowStockProducts;
    public $totalOutOfStockProducts;
    public $activeOptions = [
        ['id' => '1', 'name' => 'Ativo'],
        ['id' => '0', 'name' => 'Inativo'],
    ];
    public $statusOptions = [
        ['id' => 'available', 'name' => 'Disponível'],
        ['id' => 'low_stock', 'name' => 'Estoque Baixo'],
        ['id' => 'out_of_stock', 'name' => 'Fora de Estoque'],
    ];

    #[Url]
    public $search = '';
    #[Url]
    public $category = '';
    #[Url]
    public $isActive = '';
    #[Url]
    public $status = '';

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
        $query = Auth::user()->seller->products()->with('category');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->category) {
            $query->where('category_id', $this->category);
        }

        if ($this->isActive !== '') {
            $query->where('is_active', $this->isActive);
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        return view('livewire.seller.product.list-products', [
            'products' => $query->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
