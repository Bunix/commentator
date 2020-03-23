<?php

namespace Plmrlnsnts\Commentator\Livewire;

use Livewire\Component;
use Plmrlnsnts\Commentator\Comment;

class CommentListItem extends Component
{
    public $comment;

    public $body;

    public $editing = false;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;

        $this->body = $comment->body;
    }

    public function toggleEditing()
    {
        $this->editing = ! $this->editing;

        if ($this->editing) {
            $this->emit('editingEnabled');
        }
    }

    public function updateComment()
    {
        $values = $this->validate([
            'body' => ['required', 'string'],
        ]);

        $this->comment->update($values);

        $this->toggleEditing();
    }

    public function deleteComment()
    {
        $this->comment->delete();

        $this->emit('commentDeleted', $this->comment->id);
    }

    public function render()
    {
        return view('commentator::comment-list-item');
    }
}
