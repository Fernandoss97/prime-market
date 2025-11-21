<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable, HasRoles;

    /* protected function password(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Hash::make($value),
        );
    } */

    public function seller()
    {
        return $this->hasOne(Seller::class);
    }
}
