<?php

declare(strict_types=1);

namespace App\Livewire\Profile;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteUserForm extends Component
{
    public bool $confirmingUserDeletion = false;

    public string $password = '';

    public function confirmUserDeletion(): void
    {
        $this->confirmingUserDeletion = true;
        $this->dispatch('confirming-delete-user');
    }

    public function deleteUser(): void
    {
        $this->validate(['password' => ['required', 'current_password:web']]);

        $user = auth()->user();

        $user->deleteProfilePhoto();

        Auth::logout();

        $user->delete();

        if (request()->hasSession()) {
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

        $this->redirect('/');
    }

    public function render(): View
    {
        return view('profile.delete-user-form');
    }
}
