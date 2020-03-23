<?php

namespace Plmrlnsnts\Commentator\Livewire;

use Livewire\Component;

class Comments extends Component
{
    public $commentable;

    public function mount($commentable)
    {
        $this->commentable = $commentable;
    }

    public function render()
    {
        return view('commentator::comments');
    }
}
