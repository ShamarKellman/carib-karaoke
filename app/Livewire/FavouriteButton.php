<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Favourite;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FavouriteButton extends Component
{
    public bool $isFav;

    public int $songId;

    public function mount(bool $isFav, int $songId): void
    {
        $this->isFav = $isFav;
        $this->songId = $songId;
    }

    public function toggleFavourite(): void
    {
        if ($this->isFav) {
            Favourite::query()->whereUserId(auth()->id())->whereSongId($this->songId)->delete();
            $this->isFav = false;
        } else {
            Favourite::query()->create([
                'user_id' => auth()->id(),
                'song_id' => $this->songId,
            ]);

            $this->isFav = true;
        }
    }

    public function render(): View
    {
        return view('livewire.favourite-button');
    }
}
