<?php

namespace App\Livewire\Seller\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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

    public function mount()
    {
        //mover para um service fazendo uma query única
        $this->totalProducts = Auth::user()->seller->products()->count();
        $this->totalActiveProducts = Auth::user()->seller->products()->where('is_active', true)->count();
        $this->totalLowStockProducts = Auth::user()->seller->products()->where('stock', '<', 10)->count();
        $this->totalOutOfStockProducts = Auth::user()->seller->products()->where('stock', 0)->count();
    }

    #[On('product-created')]
    public function refreshTable()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.seller.product.list-products', [
            'categories' => Category::orderBy('name')->get(),
            'products' => Auth::user()->seller->products()->with('category')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
