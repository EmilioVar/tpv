<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Table;

class ProductSelector extends Component
{
    public $products;

    protected $listeners = ['groupSelected' => 'loadProducts'];

    public function loadProducts($groupId)
    {
        $this->products = Product::where('group_id', $groupId)->get();
    }

    public function productSelected($productId)
    {
        if(session()->has('tableSelected')) {
            $table = Table::find(session('tableSelected'));
            $product = Product::find($productId);
            
            $existingProduct = $table
                ->products()
                ->where('product_id', $productId)
                ->first();
    
            if ($existingProduct) {
                $existingProduct->pivot->increment('quantity');
            } else {
                $table->products()->attach($productId, ['quantity' => 1,'price'=>$product->price]);
            }
    
            $this->emit('productSelect');
            $this->emit('updateTotalAmount');
            $this->dispatchBrowserEvent('renderSelectItemInProuctsTpv',);
        } else {
            dd('seleccione una mesa!');
        }
    }

    public function render()
    {
        return view('livewire.products.product-selector');
    }
}
