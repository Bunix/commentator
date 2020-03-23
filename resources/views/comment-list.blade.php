<div>
    @forelse($comments as $comment)
        @livewire('commentator::comment-list-item', compact('comment'), key($comment->id))
    @empty
        <div class="text-center text-gray-600 py-8">
            Be the first to comment.
        </div>
    @endforelse
</div>
