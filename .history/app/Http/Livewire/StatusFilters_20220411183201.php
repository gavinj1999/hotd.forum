<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class StatusFilters extends Component
{
    public $status = 'All';
    public $statusCount;

    protected $queryString = [
        'status'
    ];

    public function mount(){
        
        $this->statusCount = Idea::query()
        ->selectRaw("count(*) as all_statuses")
        ->selectRaw("count(case when status_id = 1 then 1 end) as open")
        ->selectRaw("count(case when status_id = 2 then 1 end) as considering")
        ->selectRaw("count(case when status_id = 3 then 1 end) as in_progress")
        ->selectRaw("count(case when status_id = 4 then 1 end) as implemented")
        ->selectRaw("count(case when status_id = 5 then 1 end) as closed")
        ->first()
        ->toArray();

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