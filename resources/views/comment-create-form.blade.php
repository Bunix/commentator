<form wire:submit.prevent="submit">
    <div class="flex items-start -mx-2">
        <div class="flex-shrink-0 px-2">
            @guest
                <img class="w-12 h-12 border rounded-lg" src="https://api.adorable.io/avatars/face/eyes4/nose3/mouth7/8e8895" alt="">
            @else
                <img class="w-12 h-12 border rounded-lg" src="{{ auth()->user()->avatar }}" alt="">
            @endguest
        </div>
        <div class="flex-1 px-2">
            <input
                type="text"
                wire:model="body"
                placeholder="Join the discussion ..."
                class="border-2 bg-white rounded-lg leading-tight px-4 py-3 block w-full focus:outline-none focus:shadow-outline focus:border-blue-500">

            @error('body')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
</form>
