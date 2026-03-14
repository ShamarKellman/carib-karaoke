<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasProfilePhoto
{
    /**
     * Update the user's profile photo.
     */
    public function updateProfilePhoto(UploadedFile $photo, string $storagePath = 'profile-photos'): void
    {
        tap($this->profile_photo_path, function ($previous) use ($photo, $storagePath) {
            $this->forceFill([
                'profile_photo_path' => $photo->storePublicly($storagePath, ['disk' => 'public']),
            ])->save();

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });
    }

    /**
     * Delete the user's profile photo.
     */
    public function deleteProfilePhoto(): void
    {
        if (is_null($this->profile_photo_path)) {
            return;
        }

        Storage::disk('public')->delete($this->profile_photo_path);

        $this->forceFill([
            'profile_photo_path' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's profile photo.
     */
    public function getProfilePhotoUrlAttribute(): string
    {
        return $this->profile_photo_path
            ? Storage::disk('public')->url($this->profile_photo_path)
            : $this->defaultProfilePhotoUrl();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     */
    protected function defaultProfilePhotoUrl(): string
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF';
    }
}
