<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Genre extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
    ];

    /**
     * @return HasMany<Song>
     */
    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
