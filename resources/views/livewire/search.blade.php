<div class="w-full">
    <div class="relative flex rounded-2xl overflow-hidden bg-gray-900 border border-white/10 focus-within:border-violet-500/50 focus-within:ring-1 focus-within:ring-violet-500/30 transition-all duration-200">
        <div class="flex items-center pl-4 pointer-events-none">
            <x-heroicon-o-magnifying-glass class="h-5 w-5 text-gray-500" />
        </div>
        <input
            class="flex-1 bg-transparent border-0 pl-3 pr-4 py-3.5 text-white placeholder-gray-500 focus:ring-0 focus:outline-none text-sm"
            type="text"
            placeholder="Search songs, artists, genres..."
            wire:model.live.debounce.1000ms="search"
        />
        <select wire:model.live="type" class="bg-gray-800 border-0 border-l border-white/10 text-gray-300 text-sm pr-8 pl-4 py-3.5 focus:ring-0 focus:outline-none cursor-pointer hover:bg-gray-700 transition-colors">
            @foreach(App\Enums\SearchType::cases() as $type)
                <option value="{{ $type->value }}" class="bg-gray-900">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-6 flex flex-col gap-2">
        @forelse($songs as $song)
            <x-song-item :song="$song" wire:key="{{ $song->id }}"></x-song-item>
        @empty
            @if($search)
                <div class="flex flex-col items-center justify-center py-20 gap-3 text-gray-500">
                    <x-heroicon-o-magnifying-glass class="h-12 w-12 text-gray-700" />
                    <p class="text-lg font-medium text-gray-400">No songs found</p>
                    <p class="text-sm">Try a different search term or filter</p>
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-20 gap-3 text-gray-500">
                    <x-heroicon-o-musical-note class="h-12 w-12 text-gray-700" />
                    <p class="text-lg font-medium text-gray-400">Find your next song</p>
                    <p class="text-sm">Start typing to search through our karaoke library</p>
                </div>
            @endif
        @endforelse
    </div>
</div>
