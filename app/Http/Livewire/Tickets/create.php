<?php

namespace App\Http\Livewire\Tickets;

use App\Models\Table;
use App\Models\Ticket;
use Livewire\Component;

class create extends Component
{
    public $totalTicket;
    public $table_id;
    public $type_pay = "efectivo";

    protected $listeners = ['totalAmountChangeToTicket', 'totalAmountChangeToTicket'];

    protected $rules = [
        'totalTicket' => 'nullable',
        'table_id' => 'nullable',
        'type_pay' => 'nullable'
    ];

    public function submit() {

        $products = Table::find(session('tableSelected'))->products;

        $t = new Ticket();
        $t->table_id = session('tableSelected');
        $t->type_pay = $this->type_pay;
        $t->products = json_encode($products);
        $t->total_ticket = $this->totalTicket;

        $t->save();

        return true;
        
    }

    public function totalAmountChangeToTicket($total) {
       $this->totalTicket = $total;
    }
    
    public function render()
    {
        return view('livewire.tickets.create');
    }
}
