<?php

namespace App\Filament\Tables\Columns;

use App\Models\User;
use Filament\Tables\Columns\Column;

class UserRoleColumn extends Column
{
    protected string $view = 'filament.tables.columns.user-role-column';

    protected ?User $user = null;

    public function getUserRoles(): ?User
    {
        if (! $this->user) {
            return null;
        }

        return $this->user->roles()->pluck('name')->toArray();
    }
}
