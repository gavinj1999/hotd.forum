<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IdeasIndex extends Component
{
    public function render()
    {
        return view('livewire.ideas-index',[
            'ideas' => Idea::with('user','category', 'status')
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
