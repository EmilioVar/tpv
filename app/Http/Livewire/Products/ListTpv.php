<?php

namespace App\Http\Livewire\Products;

use App\Models\Table;
use Livewire\Component;

class ListTpv extends Component
{
    public $productsTpv;

    protected $listeners = ['productSelect' => 'updateProductsInTable'];

    public function updateProductsInTable()
    {
        $this->productsTpv = Table::find(1)->products;
    }

    public function productIncrement($productId)
    {
        Table::find(1)
            ->products()
            ->where('product_id', $productId)
            ->first()
            ->pivot->increment('quantity');
        $this->productsTpv = Table::find(1)->products;
    }

    public function productDecrement($productId)
    {
        Table::find(1)
            ->products()
            ->where('product_id', $productId)
            ->first()
            ->pivot->decrement('quantity');
        $this->productsTpv = Table::find(1)->products;
    }

    public function render()
    {
        return view('livewire.products.list-tpv');
    }
}
