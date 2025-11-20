<?php

namespace App\Livewire\Seller;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.seller.products', [
            'products' => Auth::user()->seller->products()->with('category')->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
