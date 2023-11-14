<?php

declare(strict_types=1);

it('can load home page')
    ->get('/')
    ->assertOk()
    ->assertSee('Search')
    ->assertSee('Start Singing');

it('can load search page')
    ->get('/search')
    ->assertOk()
    ->assertSee('Karaoke Songs')
    ->assertSee('Start typing to search');
