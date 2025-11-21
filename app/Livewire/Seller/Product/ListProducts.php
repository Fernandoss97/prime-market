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

    #[On('product-created')]
    public function refreshTable()
    {
        // Garante que volte para a primeira página e recarregue os dados
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
