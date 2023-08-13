<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DisplayTableSelected extends Component
{
    protected $listeners = ['tableSelected' => 'updateDisplay'];
    public $tableSelected;

    public function updateDisplay() {
        $this->tableSelected = session('tableSelected');
        $this->render();
    }
    public function render()
    {
        return view('livewire.display-table-selected');
    }
}
