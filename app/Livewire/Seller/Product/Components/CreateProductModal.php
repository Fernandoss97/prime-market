<?php

namespace App\Livewire\Seller\Product\Components;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateProductModal extends Component
{
    use Toast;

    public string $name = '';
    public string $brand = '';
    public ?int $category_id = null;
    public float $price = 0;
    public int $stock = 0;
    public string $description = '';

    public $open = false;
    public $categories = [];

    #[On('open-create-modal')]
    public function openModal()
    {
        $this->reset(['name', 'category_id', 'price', 'stock', 'description']);
        $this->open = true;
    }

    public function create()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
        ]);

        Product::create([
            'name' => $validated['name'],
            'brand' => $validated['brand'],
            'category_id' => $validated['category_id'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'description' => $validated['description'],
            'seller_id' => Auth::user()->seller->id,
        ]);

        $this->open = false;
        $this->reset(['name', 'category_id', 'price', 'stock', 'description', 'brand']);
        $this->success('Produto criado com sucesso!');
        $this->dispatch('product-created');
    }

    public function render()
    {
        return view('livewire.seller.product.components.create-product-modal');
    }
}
