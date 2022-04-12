<?php

namespace App\Http\Livewire;

use App\Jobs\NotifyAllVoters;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;
use App\Mail\IdeaStatusUpdateMailable;
use Illuminate\Support\Facades\Mail;

class SetStatus extends Component
{
    public $idea;
    public $status;
    public $comment;
    public $notifyAllVoters;

    public function mount(Idea $idea)
    {

        $this->idea = $idea;
        
        $this->status = $this->idea->status_id;
        if ($this->notifyAllVoters) {
            NotifyAllVoters::dispatch($this->idea);

        }
    }

    public function setStatus()
    {
        if (auth()->guest() || ! auth()->user()->isAdmin()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        if ($this->idea->status_id === (int) $this->status) {
            $this->emit('statusWasUpdatedError', 'Status is the same!');

            return;
        }

        $this->idea->status_id = $this->status;
        $this->idea->save();



        // Comment::create([
        //     'user_id' => auth()->id(),
        //     'idea_id' => $this->idea->id,
        //     'status_id' => $this->status,
        //     'body' => $this->comment ?? 'No comment was added.',
        //     'is_status_update' => true,
        // ]);

        $this->reset('comment');

        $this->emit('statusWasUpdated', 'Status was updated successfully!');
    }

    public function notifyAllVoters()
    {
        dd('fdsfa');
        $this->idea->votes()
            ->select('name', 'email')
            ->chunk(100, function ($voters) {
                foreach ($voters as $user) {
                    Mail::to($user)
                        ->queue(new IdeaStatusUpdatedMailable($this->idea));
                }
            });
    }
    public function render()
    {
        return view('livewire.set-status');
    }
}