<?php

declare(strict_types=1);

namespace App\Livewire\Profile;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Component;

class LogoutOtherBrowserSessionsForm extends Component
{
    public bool $confirmingLogout = false;

    public string $password = '';

    #[Computed]
    public function sessions(): Collection
    {
        if (config('session.driver') !== 'database') {
            return collect();
        }

        return collect(
            DB::table(config('session.table', 'sessions'))
                ->where('user_id', auth()->id())
                ->orderBy('last_activity', 'desc')
                ->get()
        )->map(function ($session) {
            return (object) [
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === request()->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
    }

    public function confirmLogout(): void
    {
        $this->confirmingLogout = true;
        $this->dispatch('confirming-logout-other-browser-sessions');
    }

    public function logoutOtherBrowserSessions(): void
    {
        $this->validate(['password' => ['required', 'current_password:web']]);

        Auth::logoutOtherDevices($this->password);

        if (config('session.driver') === 'database') {
            DB::table(config('session.table', 'sessions'))
                ->where('user_id', auth()->id())
                ->where('id', '!=', request()->session()->getId())
                ->delete();
        }

        $this->confirmingLogout = false;
        $this->password = '';

        $this->dispatch('loggedOut');
    }

    public function render(): View
    {
        return view('profile.logout-other-browser-sessions-form');
    }
}
