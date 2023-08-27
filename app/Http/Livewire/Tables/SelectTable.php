<?php

namespace App\Http\Livewire\Tables;

use Illuminate\Support\Facades\Session;
use App\Models\Table;
use Livewire\Component;

class SelectTable extends Component
{
    public $tables;

    public function tableSelected($tableId) 
    {
        $tables = Table::all();

        foreach($tables as $table) {
            $table->selected = 0;
            $table->save();
        }

        $table = Table::find($tableId);
        Session::put('tableSelected', $tableId);
        $table->selected = 1;
        $table->save();
        
        $this->emit('tableSelected');
        $this->emit('updateTotalAmount');
        $this->dispatchBrowserEvent('tableSelected');
    }
    
    public function render()
    {
        return view('livewire.tables.select-table');
    }
}
