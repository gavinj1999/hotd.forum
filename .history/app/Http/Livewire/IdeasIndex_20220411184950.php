<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    //use WithPagination;
    public $status = 'All';

    protected $queryString = [
        'status'
    ];

    protected $listeners = [
        'queryStringUpdateStatus'
    ];

    public function queryStringUpdateStatus($newStatus){
        $this->status  = $newStatus;
    }

    public function render()
    {
        $statuses = Status::all()->pluck('id','name');
        return view('livewire.ideas-index',[
            'ideas' => Idea::with('user','category', 'status')
            ->when($this->status && $this->status != 'All', function($query) use ($statuses){
                return $query->where('status_id',$statuses->get($this->status));
            })
            ->addSelect(['voted_by_user'=> Vote::select('id')
                        ->where('user_id', auth()->id())
                        ->whereColumn('idea_id','ideas.id')
            ])

            ->withCount('votes')
            ->orderBy('id','desc')
            ->simplePaginate(Idea::PAGINATION_COUNT),
        ]);
    }
}
