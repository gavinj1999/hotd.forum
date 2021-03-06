<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class StatusFilters extends Component
{
    public $status = 'All';

    protected $queryString = [
        'status'
    ];

    public function mount(){
        if(Route::currentRouteName() === 'idea.show'){
            $this->status = null;
            $this->queryString = [];
        }
    }

    public function setStatus($newStatus){
        $this->status =$newStatus;

        if( $this->getPreviousRouteName() === 'idea.show'){

   
        return redirect()->route('idea.index',[
            'status' => $this->status,
        ]);
             }
    }

    public function getPreviousRouteName(){
        return app('router')->getroutes()->match(app('request')->create(url()->previous()))->getName();
    } 


    public function render()
    {
        return view('livewire.status-filters');
    }
}
