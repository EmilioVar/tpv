<?php

namespace App\Http\Livewire\Products;

use App\Models\Table;
use Livewire\Component;

class ListTpv extends Component
{
    public $productsTpv;
    public $quantityProduct;
    public $idProduct;

    protected $listeners = ['productSelect' => 'updateProductsInTable',
    'tableSelected' => 'updateProductsInTable', 
    'productQuantityChangued' => 'productQuantityChangued',
    'productIncrementKeyboard' => 'renderizame',
    'deletedAllProductsInCurrentTable' => 'renderizame',
];

    public function updateProductsInTable()
    {
        $this->productsTpv = Table::find(session('tableSelected'))->products;
        $this->dispatchBrowserEvent('renderSelectItemInProuctsTpv');
    }

    public function productQuantityChangued($quantityProduct,$idProduct) {
        $pivotTable = Table::find(session('tableSelected'))
        ->products()
        ->where('product_id', $idProduct)
        ->first()
        ->pivot->update(['quantity' => $quantityProduct]);
    }

    public function productIncrement($productId)
    {
        Table::find(session('tableSelected'))
            ->products()
            ->where('product_id', $productId)
            ->first()
            ->pivot->increment('quantity');

        $this->productsTpv = Table::find(session('tableSelected'))->products;
        $this->emit('updateTotalAmount');
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
        $this->emit('updateTotalAmount');
    }

    public function productRemove($productId) {
        $product = Table::find(session('tableSelected'))
        ->products()
        ->where('product_id', $productId)
        ->first();

        $product->tables()->detach($productId);

        $this->productsTpv = Table::find(session('tableSelected'))->products;
        $this->emit('updateTotalAmount');
    }

    public function renderizame() {
        $this->productsTpv = Table::find(session('tableSelected'))->products;
        $this->render();
    }

    public function render()
    {
        return view('livewire.products.list-tpv');
    }
}
