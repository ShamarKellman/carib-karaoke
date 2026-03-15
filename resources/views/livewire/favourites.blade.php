<div class="w-full flex flex-col gap-2">
    @forelse($favourites as $favourite)
        <x-song-item :song="$favourite" wire:key="{{ $favourite->id }}"></x-song-item>
    @empty
        <div class="flex flex-col items-center justify-center py-20 gap-4 text-gray-500">
            <x-heroicon-o-heart class="h-12 w-12 text-gray-700" />
            <div class="text-center">
                <p class="text-lg font-medium text-gray-400">No favourites yet</p>
                <p class="text-sm mt-1">Search for songs and tap the heart to save them here</p>
            </div>
            <a href="{{ route('search') }}" class="inline-flex items-center gap-2 px-5 py-2 bg-gradient-to-r from-violet-600 to-pink-600 hover:from-violet-500 hover:to-pink-500 text-white text-sm font-semibold rounded-full transition-all duration-200 shadow-lg shadow-violet-900/30">
                <x-heroicon-o-magnifying-glass class="h-4 w-4" />
                Browse Songs
            </a>
        </div>
    @endforelse
</div>
