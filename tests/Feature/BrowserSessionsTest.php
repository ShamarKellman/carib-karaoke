<?php

declare(strict_types=1);

use App\Livewire\Profile\LogoutOtherBrowserSessionsForm;
use App\Models\User;
use Livewire\Livewire;

test('other browser sessions can be logged out', function () {
    $this->actingAs($user = User::factory()->create());

    Livewire::test(LogoutOtherBrowserSessionsForm::class)
        ->set('password', 'password')
        ->call('logoutOtherBrowserSessions')
        ->assertSuccessful();
});
