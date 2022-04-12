<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatusFilters extends Component
{
    public $status = 'All';

    protected $queryString = [
        'status'
    ];

    public function mount(){
        if(Route::currentRouteName() === 'idea.show'){
            $this->status = null;
        }
    }

    public function setStatus($newStatus){
        $this->status =$newStatus;
    }

    public function render()
    {
        return view('livewire.status-filters');
    }
}
