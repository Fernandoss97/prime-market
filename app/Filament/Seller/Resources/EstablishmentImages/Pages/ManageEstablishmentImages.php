<?php

namespace App\Filament\Seller\Resources\EstablishmentImages\Pages;

use App\Filament\Seller\Resources\EstablishmentImages\EstablishmentImagesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageEstablishmentImages extends ManageRecords
{
    protected static string $resource = EstablishmentImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
