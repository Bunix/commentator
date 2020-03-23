<?php

namespace Plmrlnsnts\Commentator\Livewire;

use Livewire\Component;
use Plmrlnsnts\Commentator\Comment;

class CommentList extends Component
{
    public $commentable;

    public $comments;

    protected $listeners = [
        'commentCreated',
        'commentDeleted'
    ];

    public function commentCreated($id)
    {
        $comment = Comment::find($id);

        $this->comments->prepend($comment);
    }

    public function commentDeleted($id)
    {
        $this->comments = $this->comments->reject(function ($comment) use ($id) {
            return $comment->id == $id;
        });
    }

    public function mount($commentable)
    {
        $this->commentable = $commentable;

        $this->comments = $commentable->comments()
            ->with('author')
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('commentator::comment-list');
    }
}
