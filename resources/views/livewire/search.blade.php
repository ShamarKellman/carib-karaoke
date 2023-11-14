<div class="w-full">
    <div class="relative text-gray-600">
        <div class="w-full flex">
            <x-input
                class="pl-10 flex-1 rounded-r-none"
                type="text"
                placeholder="Start typing to search..."
                wire:model.live.debounce.1000ms="search"
            />
            <select wire:model.live="type" name="" id="" class="w-28 rounded-r-md border-l-0 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm">
                @foreach(App\Enums\SearchType::cases() as $type)
                    <option value="{{ $type->value }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="absolute top-0 left-0 pl-3 pt-3">
            <x-heroicon-o-magnifying-glass class="h-5 w-5 text-gray-400" />
        </div>
    </div>

    <div class="mt-10">
        @forelse($songs as $song)
            <x-song-item :song="$song" wire:key="{{ $song->id }}"></x-song-item>
        @empty
            <p>No songs</p>
        @endforelse
    </div>
</div>
