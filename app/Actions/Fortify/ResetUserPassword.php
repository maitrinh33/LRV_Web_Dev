<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  Authenticatable  $user
     * @param  array<string, string>  $input
     */
    public function reset(Authenticatable $user, array $input): void
    {
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validate();

        // Cast to User if you need to access User-specific methods
        $user = $user instanceof User ? $user : User::find($user->id);

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}