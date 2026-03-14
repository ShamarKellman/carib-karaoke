<?php

declare(strict_types=1);

namespace App\Livewire\Profile;

use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdatePasswordForm extends Component
{
    /** @var array<string, string> */
    public array $state = [
        'current_password' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    public function updatePassword(): void
    {
        app(UpdateUserPassword::class)->update(auth()->user(), $this->state);

        $this->state = [
            'current_password' => '',
            'password' => '',
            'password_confirmation' => '',
        ];

        $this->dispatch('saved');
    }

    public function render(): View
    {
        return view('profile.update-password-form');
    }
}
