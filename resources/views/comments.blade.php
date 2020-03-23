<div class="bg-gray-100 p-6">
    @livewire('commentator::comment-create-form', compact('commentable'))
    <div class="mt-4">
        @livewire('commentator::comment-list', compact('commentable'))
    </div>
</div>
