<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Actions\SearchAction;
use App\Enums\SearchType;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Url;
use Livewire\Component;

class Search extends Component
{
    #[Url(as: 'query')]
    public ?string $search = '';

    #[Url(as: 'type')]
    public string $type = '';

    private Collection $songs;

    private SearchAction $searchAction;

    public function boot(SearchAction $searchAction): void
    {
        $this->searchAction = $searchAction;
        $this->songs = new Collection([]);
    }

    public function updatedType(): void
    {
        $this->getSongs();
    }

    public function render(): View
    {
        $this->getSongs();

        return view('livewire.search', [
            'songs' => $this->songs,
        ]);
    }

    private function getSongs(): void
    {
        if (strlen($this->search ?? '') > 2) {
            $this->songs = $this->searchAction->search($this->search, SearchType::tryFrom($this->type));
        }
    }
}
