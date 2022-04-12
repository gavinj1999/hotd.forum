<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use App\Models\Filter;
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
    public £search;

    protected $queryString = [
        'status',
        'category',
        'filter',
        'search',
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

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingCategory(){
        $this->resetPage();
    }

    public function updatingFilter(){
        $this->resetPage();
    }

    public function updatedFilter(){
       if($this->filter === 'My Ideas'){
           if(! auth()->check()){
               return redirect()->route('login');
           }
       }
    }

 

    public function queryStringUpdateStatus($newStatus){
        $this->resetPage();
        $this->status  = $newStatus;
    }

    public function render()
    {
        $statuses = Status::all()->pluck('id','name');
        $categories = Category::all();
        $filters = Filter::all();
        return view('livewire.ideas-index',[
            'ideas' => Idea::with('user','category', 'status')
            ->when($this->status && $this->status != 'All', function($query) use ($statuses){
                return $query->where('status_id',$statuses->get($this->status)); 
            })
            ->when($this->category && $this->category !== 'All Categories', function ($query) use ($categories) {
                    return $query->where('category_id', $categories->pluck('id', 'name')->get($this->category));
                })
                ->when($this->filter && $this->filter === 'Top Voted', function ($query) {
                    return $query->orderByDesc('votes_count');
                })->when($this->filter && $this->filter === 'My Ideas', function ($query) {
                    return $query->where('user_id', auth()->id());
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
