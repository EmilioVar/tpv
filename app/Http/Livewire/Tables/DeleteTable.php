<?php

namespace App\Http\Livewire\Tables;

use App\Models\Table;
use Livewire\Component;

class DeleteTable extends Component
{
    public function deleteActualTable() {
        $sessionTable = session('tableSelected');

        $allProductsTable = Table::find($sessionTable)->products()->detach();
        $this->emit('deletedAllProductsInCurrentTable');
    }

    public function render()
    {
        return view('livewire.tables.delete-table');
    }
}
