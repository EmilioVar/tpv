<?php

namespace App\Http\Livewire;

use App\Models\Table;
use Livewire\Component;

class TotalPriceAmount extends Component
{
    protected $listeners = ['updateTotalAmount' => 'render'];
    public function render()
    {
        if(session()->has('tableSelected')) {
            $tableSelected = session('tableSelected');
    
            $products = Table::find($tableSelected)->products;
    
            $total = $products->reduce(function ($carry, $product) {
                return $carry + $product->pivot->price * $product->pivot->quantity;
            }, 0);
        } else {
            $total = 0;
        }

        return view('livewire.total-price-amount', compact('total'));
    }
}
