<?php

namespace App\Http\Livewire;

use App\Models\Table;
use Livewire\Component;

class Keyboard extends Component
{
    public $inputKeyboard = '';

    protected $listeners = [
        'eventoDesdeJS' => 'keyPressed',
        'incrementProductKeyboard' => 'incrementProductInKeyboard',
        'priceProductKeyboard' => 'priceProductInKeyboard',
    ];

    public function keyPressed($key)
    {
        $this->inputKeyboard .= $key;
    }

    public function incrementProductInKeyboard($productId, $quantity)
    {
        $pivotTable = Table::find(session('tableSelected'))
            ->products()
            ->where('product_id', $productId)
            ->first()
            ->pivot->update(['quantity' => $quantity]);

        $this->inputKeyboard = '';

        $this->emit('productIncrementKeyboard');
    }

    public function priceProductInKeyboard($productId, $price)
    {
        $pivotTable = Table::find(session('tableSelected'))
            ->products()
            ->where('product_id', $productId)
            ->first()
            ->pivot->update(['price' => $price]);

        $this->inputKeyboard = '';

        $this->emit('productIncrementKeyboard');
    }

    public function render()
    {
        return view('livewire.keyboard');
    }
}
