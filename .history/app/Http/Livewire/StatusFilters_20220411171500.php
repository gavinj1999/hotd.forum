<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class StatusFilters extends Component
{
    public $status = 'All';
    public $statusAllCount;

    protected $queryString = [
        'status'
    ];

    public function mount(){

        $this->statusAllCount - Idea::count();
        $this->statusAllCount - Idea::where('status_id',1)->count();

        if(Route::currentRouteName() === 'idea.show'){
            $this->status = null;
            $this->queryString = [];
        }
    }

    public function setStatus($newStatus){
        $this->status =$newStatus;

        // if( $this->getPreviousRouteName() === 'idea.show'){

   
        return redirect()->route('idea.index',[
            'status' => $this->status,
        ]);
            //  }
    }

    public function getPreviousRouteName(){
        return app('router')->getroutes()->match(app('request')->create(url()->previous()))->getName();
    } 


    public function render()
    {
        return view('livewire.status-filters');
    }
}