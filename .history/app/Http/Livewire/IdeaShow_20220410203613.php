<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IdeaShow extends Component
{
    public $idea;

    public function  mount(){

    }

    public function render()
    {
        return view('livewire.idea-show');
    }
}
