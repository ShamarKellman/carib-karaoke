<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Song extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'code',
        'release_year',
        'artist_id',
        'brand_id',
        'genre_id',
    ];

    protected $casts = [
        'release_year' => 'datetime:Y',
    ];

    /**
     * @return BelongsTo<Brand, Song>
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return BelongsTo<Genre, Song>
     */
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    /**
     * @return BelongsTo<Artist, Song>
     */
    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }

    public function isFavourite(): bool
    {
        if (! auth()->check()) {
            return false;
        }

        $ids = auth()->user()->favourites()->pluck('song_id')->toArray();

        return in_array($this->id, $ids);
    }
}
