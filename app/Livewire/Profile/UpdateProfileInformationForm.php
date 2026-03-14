<?php

declare(strict_types=1);

namespace App\Livewire\Profile;

use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileInformationForm extends Component
{
    use WithFileUploads;

    /** @var array<string, string> */
    public array $state = [];

    public mixed $photo = null;

    public bool $verificationLinkSent = false;

    public function mount(): void
    {
        $user = auth()->user();

        $this->state = [
            'name' => $user->name,
            'email' => $user->email,
        ];
    }

    #[Computed]
    public function user(): User
    {
        return auth()->user();
    }

    public function updateProfileInformation(): void
    {
        $input = $this->state;

        if ($this->photo) {
            $input['photo'] = $this->photo;
        }

        app(UpdateUserProfileInformation::class)->update(auth()->user(), $input);

        if ($this->photo) {
            $this->photo = null;
        }

        $this->dispatch('saved');
    }

    public function deleteProfilePhoto(): void
    {
        auth()->user()->deleteProfilePhoto();
        $this->photo = null;
    }

    public function sendEmailVerification(): void
    {
        auth()->user()->sendEmailVerificationNotification();
        $this->verificationLinkSent = true;
    }

    public function render(): View
    {
        return view('profile.update-profile-information-form');
    }
}
