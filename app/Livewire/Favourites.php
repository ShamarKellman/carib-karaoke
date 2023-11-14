<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Favourites extends Component
{
    public function render(): View
    {
        $favourites = auth()->user()->load('songs', 'songs.artist')->songs;

        return view('livewire.favourites', [
            'favourites' => $favourites,
        ]);
    }
}
