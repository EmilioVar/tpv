<?php

namespace App\Http\Livewire;

use App\Models\Table;
use Livewire\Component;

class TotalPriceAmount extends Component
{
    protected $listeners = ['updateTotalAmount' => 'render'];
    public function render()
    {
        $tableSelected = session('tableSelected');

        $products = Table::find($tableSelected)->products;

        $total = $products->reduce(function ($carry, $product) {
            // Multiplicar precio por cantidad y sumar al acumulador
            return $carry + $product->pivot->price * $product->pivot->quantity;
        }, 0); // El segundo parámetro de reduce es el valor inicial del acumulador

        return view('livewire.total-price-amount', compact('total'));
    }
}
