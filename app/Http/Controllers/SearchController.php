<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class SearchController
{
    public function __invoke()
    {
        return view('search');
    }
}
