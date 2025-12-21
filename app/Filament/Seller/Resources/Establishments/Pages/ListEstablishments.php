<?php

namespace App\Filament\Seller\Resources\Establishments\Pages;

use App\Filament\Seller\Resources\Establishments\EstablishmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEstablishments extends ListRecords
{
    protected static string $resource = EstablishmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
