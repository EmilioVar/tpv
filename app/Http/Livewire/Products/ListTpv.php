<?php

namespace App\Http\Livewire\Products;

use App\Models\Table;
use Livewire\Component;

class ListTpv extends Component
{
    public $productsTpv;

    protected $listeners = ['productSelect' => 'updateProductsInTable', 'tableSelected' => 'updateProductsInTable'];

    public function updateProductsInTable()
    {
        $this->productsTpv = Table::find(session('tableSelected'))->products;
    }

    public function productIncrement($productId)
    {
        Table::find(session('tableSelected'))
            ->products()
            ->where('product_id', $productId)
            ->first()
            ->pivot->increment('quantity');

        $this->productsTpv = Table::find(session('tableSelected'))->products;
    }

    public function productDecrement($productId)
    {
        $product = Table::find(session('tableSelected'))
        ->products()
        ->where('product_id', $productId)
        ->first();
        
        $quantity = $product->pivot->quantity;

        if($quantity == 1) {
            $product->tables()->detach($productId);
        } else {
            $product->pivot->decrement('quantity');
        }
        
        $this->productsTpv = Table::find(session('tableSelected'))->products;
    }

    public function productRemove($productId) {
        $product = Table::find(session('tableSelected'))
        ->products()
        ->where('product_id', $productId)
        ->first();

        $product->tables()->detach($productId);

        $this->productsTpv = Table::find(session('tableSelected'))->products;
    }

    public function render()
    {
        return view('livewire.products.list-tpv');
    }
}
