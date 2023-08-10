<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductSelector extends Component
{
    public $products;

    protected $listeners = ['groupSelected' => 'loadProducts'];

    public function loadProducts($groupId)
    {
        $this->products = Product::where('group_id', $groupId)->get();
    }

    public function render()
    {
        return view('livewire.products.product-selector');
    }
}
