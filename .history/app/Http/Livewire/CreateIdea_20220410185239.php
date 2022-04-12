<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;
use App\Models\Category;

class CreateIdea extends Component
{
    public $title;
    public $category  = 1;
    public $description ;

    public function createIdea(){

        if(auth()->check()){
                    Idea::create([
            'user_id' => auth()->id(),

        ]);
        }
        abort(Response::HTTP_FORBIDDEN);

    }

    public function render()
    {
        return view('livewire.create-idea',[
            'categories' => Category::all()
        ]);
    }
}
