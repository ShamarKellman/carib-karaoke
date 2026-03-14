<?php

declare(strict_types=1);

namespace App\Actions;

use App\Enums\SearchType;
use App\Models\Artist;
use App\Models\Brand;
use App\Models\Genre;
use App\Models\Song;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class SearchAction
{
    public function search(?string $search, SearchType $type = SearchType::Song): Collection
    {
        return match ($type) {
            SearchType::Song, SearchType::All => $this->searchSong($search),
            SearchType::Genre => $this->searchGenre($search),
            SearchType::Artist => $this->searchArtist($search),
            SearchType::Brand => $this->searchBrand($search),
            default => collect(),
        };
    }

    private function searchSong(string $search): Collection
    {
        $songs = Song::search($search)->query(function (Builder $builder) {
            $builder->with(['artist', 'genre', 'brand']);
        })->paginate(10)->items();

        return collect($songs);
    }

    private function searchGenre(string $search): Collection
    {
        $genre = Genre::search($search)->paginate(10)->items();

        $songs = collect($genre)->flatMap(function ($genre) {
            return $genre->songs;
        });

        return $songs->unique('id');
    }

    private function searchArtist(string $search): Collection
    {
        $artists = Artist::search($search)->paginate(10)->items();

        $songs = collect($artists)->flatMap(function ($artist) {
            return $artist->songs;
        });

        return $songs->unique('id');
    }

    private function searchBrand(string $search): Collection
    {
        $brand = Brand::search($search)->paginate(10)->items();

        $songs = collect($brand)->flatMap(function ($brand) {
            return $brand->songs;
        });

        return $songs->unique('id');
    }
}
