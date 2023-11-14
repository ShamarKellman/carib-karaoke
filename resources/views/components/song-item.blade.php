@php
    $classes = auth()->check() ? 'grid-rows-5 md:grid-cols-5' : 'grid-rows-4 md:grid-cols-4'
@endphp

<div class="w-full grid gap-y-4 md:gap-y-0 grid-cols-1 {{ $classes }} md:grid-rows-1 bg-gray-700 rounded-xl p-6">
    <div>
        <div class="text-sm font-bold mb-2">{{ __('Title') }}</div>
        <div class="font-light">{{ $song->title }}</div>
    </div>
    <div>
        <div class="text-sm font-bold mb-2">{{ __('Artist') }}</div>
        <div class="font-light">{{ $song->artist->name }}</div>
    </div>
    <div>
        <div class="text-sm font-bold mb-2">{{ __('Genre') }}</div>
        <div class="font-light">{{ $song->genre->name }}</div>
    </div>
    <div>
        <div class="text-sm font-bold mb-2">{{ __('Brand') }}</div>
        <div class="font-light">{{ $song->brand->name }}</div>
    </div>
    @auth
        <div>
            <livewire:favourite-button :isFav="$song->isFavourite()" :songId="$song->id"></livewire:favourite-button>
        </div>
    @endauth
</div>
