<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Keyboard extends Component
{
    public $inputKeyboard = 0;

    protected $listeners = ['eventoDesdeJS' => 'keyPressed'];

    public function keyPressed($key) {
        $this->inputKeyboard .= $key;
    }
    public function render()
    {
        return view('livewire.keyboard');
    }
}
