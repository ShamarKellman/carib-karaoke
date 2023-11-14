<div>
    @forelse($favourites as $favourite)
        <x-song-item :song="$favourite" wire:key="$favourite->id"></x-song-item>
    @empty
        {{ __('Search to add your favourites') }}
    @endforelse
</div>
