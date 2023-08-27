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
        'dtoProductKeyboard' => 'dtoProductInKeyboard',
    ];

    public function clearInputKeyboard() {
        $this->inputKeyboard = '';
    }

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
        $this->emit('updateTotalAmount');
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
        $this->emit('updateTotalAmount');
    }

    public function dtoProductInKeyboard($inputKeyboard, $productId, $originalPrice)
    {

        $discount = (trim($originalPrice) * $inputKeyboard) / 100;
        $priceWithDiscount = $originalPrice - $discount;

        $pivotTable = Table::find(session('tableSelected'))
            ->products()
            ->where('product_id', $productId)
            ->first()
            ->pivot->update(['price' => $priceWithDiscount]);

        $this->inputKeyboard = '';

        $this->emit('productIncrementKeyboard');
        $this->emit('updateTotalAmount');
    }


    public function render()
    {
        return view('livewire.keyboard');
    }
}
