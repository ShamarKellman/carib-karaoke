<?php

declare(strict_types=1);

namespace App\Enums;

enum SearchType: string
{
    case All = '';
    case Song = 'song';
    case Artist = 'artist';
    case Genre = 'genre';
    case Brand = 'brand';
}
