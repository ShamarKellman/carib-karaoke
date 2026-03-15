<div class="flex items-center justify-center h-full">
    <button
        wire:click="toggleFavourite"
        class="group p-2 rounded-full transition-all duration-200 hover:bg-red-500/10 cursor-pointer"
        title="{{ $isFav ? 'Remove from favourites' : 'Add to favourites' }}"
    >
        <x-heroicon-o-heart class="h-6 w-6 transition-all duration-200 {{ $isFav ? 'fill-red-500 text-red-500' : 'text-gray-500 group-hover:text-red-400' }}" />
    </button>
</div>
