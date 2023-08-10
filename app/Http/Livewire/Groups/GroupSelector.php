<?php

namespace App\Http\Livewire\Groups;

use Livewire\Component;

class GroupSelector extends Component
{
    public $groups;

    public function loadProducts($groupId) {
        $this->emit('groupSelected', $groupId);
    }
    
    public function render()
    {
        return view('livewire.groups.group-selector');
    }
}
