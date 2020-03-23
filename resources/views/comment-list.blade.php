<div>
    @foreach($comments as $comment)
        @livewire('commentator::comment-list-item', compact('comment'), key($comment->id))
    @endforeach
</div>
