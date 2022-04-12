<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use App\Models\Status;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    use WithPagination;
    public $status;
    public $category;
    public $filter;

    protected $queryString = [
        'status',
        'category',
        'filter'
    ];

    public function mount(){
        $this->status = request()->status ?? 'All';
        $this->category = request()->category ?? 'All Categories';
        $this->filter = request()->filter ?? 'All Filters';
    }

    protected $listeners = [
        'queryStringUpdateStatus'
    ];

    public function updatingStatus(){
        $this->resetPage();
    }

    public function updatingCategory(){
        $this->resetPage();
    }

    public function updatingFilter(){
        $this->resetPage();
    }


    public function queryStringUpdateStatus($newStatus){
        $this->resetPage();
        $this->status  = $newStatus;
    }

    public function render()
    {
        $statuses = Status::all()->pluck('id','name');
        $categories = Category::all();
        return view('livewire.ideas-index',[
            'ideas' => Idea::with('user','category', 'status')
            ->when($this->status && $this->status != 'All', function($query) use ($statuses){
                return $query->where('status_id',$statuses->get($this->status)); 
            })
            ->when($this->category && $this->category !== 'All Categories', function ($query) use ($categories) {
                    return $query->where('category_id', $categories->pluck('id', 'name')->get($this->category));
                })
                ->when($this->filter && $this->filter !== 'All Filters', function ($query) use ($filters) {
                    return $query->where('filter_id', $filter->pluck('id', 'name')->get($this->filter));
                })    
            ->addSelect(['voted_by_user'=> Vote::select('id')
                        ->where('user_id', auth()->id())
                        ->whereColumn('idea_id','ideas.id')
            ])

            ->withCount('votes')
            ->orderBy('id','desc')
            ->simplePaginate(Idea::PAGINATION_COUNT),
            'categories' => $categories,
            'filters' => $filters
        ]);
    }
}
