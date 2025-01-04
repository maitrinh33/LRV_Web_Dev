<?php

namespace App\Actions\Jetstream;

use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  Authenticatable  $user
     */
    public function delete(Authenticatable $user): void
    {
        // Cast to User if you need to access User-specific methods
        if ($user instanceof User) {
            $user->deleteProfilePhoto();
        }

        $user->tokens->each->delete();
        $user->delete();
    }
}