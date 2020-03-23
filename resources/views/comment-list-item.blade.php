<div class="flex items-start -mx-2 py-3">
    <div class="flex-shrink-0 px-2">
        <img class="w-12 h-12 rounded-lg" src="{{ $comment->author->avatar }}" alt="">
    </div>
    <div class="flex-1 px-2">
        <h6 class="flex items-center leading-none mb-1">
            <a href="#" class="font-semibold text-blue-600 focus:underline">{{ $comment->author->name }}</a>
            <span class="text-sm text-gray-600 ml-2">{{ $comment->created_at->shortRelativeDiffForHumans() }}</span>

            @if($comment->isEdited())
                <span class="inline-block bg-gray-400 w-1 h-1 rounded-full mx-2"></span>
                <span class="text-sm text-blue-500">Edited</span>
            @endif
        </h6>

        @if($editing)
            <form wire:submit.prevent="updateComment">
                <textarea
                    rows="4"
                    type="text"
                    placeholder="{{ $comment->body }}"
                    x-data
                    x-ref="input"
                    x-init="$refs.input.focus()"
                    wire:model="body"
                    wire:keydown.enter="updateComment"
                    wire:keydown.escape="toggleEditing()"
                    class="border-2 bg-white rounded-lg leading-tight px-4 py-3 block w-full focus:outline-none focus:shadow-outline focus:border-blue-500 resize-none"
                ></textarea>

                @error('body')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </form>
            <p class="text-sm text-gray-500 mt-1">Press esc to <a href="#" class="text-blue-600" wire:click.prevent="toggleEditing()">cancel</a>.</p>
        @else
            <div class="text-gray-900">{{ $comment->body }}</div>
            <div class="flex items-center mt-1">
                <a href="#" class="text-sm text-gray-500 hover:text-gray-600 font-medium">Reply</a>

                @can('update', $comment)
                    <span class="inline-block bg-gray-400 w-1 h-1 rounded-full mx-2"></span>
                    <a href="#" class="text-sm text-gray-500 hover:text-gray-600 font-medium" wire:click.prevent="toggleEditing()">Edit</a>
                @endcan

                @can('delete', $comment)
                    <span class="inline-block bg-gray-400 w-1 h-1 rounded-full mx-2"></span>
                    <a href="#" x-data @click.prevent="if(window.confirm('Are you sure you want to delete this comment?')) @this.call('deleteComment')" class="text-sm text-gray-500 hover:text-gray-600 font-medium">Delete</a>
                @endcan
            </div>
        @endif
    </div>
</div>
