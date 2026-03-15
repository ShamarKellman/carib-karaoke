@php
    $classes = auth()->check() ? 'grid-rows-5 md:grid-cols-5' : 'grid-rows-4 md:grid-cols-4'
@endphp

<div class="w-full grid gap-y-4 md:gap-y-0 grid-cols-1 {{ $classes }} md:grid-rows-1 bg-gray-900 border border-white/10 hover:border-violet-500/40 hover:bg-gray-800/80 rounded-xl p-5 transition-all duration-200">
    <div class="flex flex-col justify-center">
        <div class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1">{{ __('Title') }}</div>
        <div class="font-semibold text-white truncate pr-2">{{ $song->title }}</div>
    </div>
    <div class="flex flex-col justify-center">
        <div class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1">{{ __('Artist') }}</div>
        <div class="font-medium text-gray-300 truncate pr-2">{{ $song->artist->name }}</div>
    </div>
    <div class="flex flex-col justify-center">
        <div class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1">{{ __('Genre') }}</div>
        <div>
            <span class="inline-flex px-2.5 py-0.5 bg-violet-500/10 border border-violet-500/20 text-violet-400 text-xs font-medium rounded-full">
                {{ $song->genre->name }}
            </span>
        </div>
    </div>
    <div class="flex flex-col justify-center">
        <div class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1">{{ __('Brand') }}</div>
        <div>
            <span class="inline-flex px-2.5 py-0.5 bg-pink-500/10 border border-pink-500/20 text-pink-400 text-xs font-medium rounded-full">
                {{ $song->brand->name }}
            </span>
        </div>
    </div>
    @auth
        <div class="flex items-center">
            <livewire:favourite-button :isFav="$song->isFavourite()" :songId="$song->id"></livewire:favourite-button>
        </div>
    @endauth
</div>
