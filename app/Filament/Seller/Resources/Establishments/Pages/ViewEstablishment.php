<?php

namespace App\Filament\Seller\Resources\Establishments\Pages;

use App\Filament\Seller\Resources\Establishments\EstablishmentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEstablishment extends ViewRecord
{
    protected static string $resource = EstablishmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
