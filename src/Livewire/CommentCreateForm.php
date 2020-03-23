<?php

namespace Plmrlnsnts\Commentator\Livewire;

use Livewire\Component;

class CommentCreateForm extends Component
{
    public $body;

    public $commentable;

    public function mount($commentable)
    {
        $this->commentable = $commentable;
    }

    public function submit()
    {
        $values = $this->validate([
            'body' => ['required', 'string'],
        ]);

        $comment = $this->commentable->comment($values['body']);

        $this->body = '';

        $this->emit('commentCreated', $comment->id);
    }

    public function render()
    {
        return view('commentator::comment-create-form');
    }
}
