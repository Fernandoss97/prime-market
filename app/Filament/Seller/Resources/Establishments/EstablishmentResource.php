<?php

namespace App\Filament\Seller\Resources\Establishments;

use App\Filament\Seller\Resources\Establishments\Pages\CreateEstablishment;
use App\Filament\Seller\Resources\Establishments\Pages\EditEstablishment;
use App\Filament\Seller\Resources\Establishments\Pages\ListEstablishments;
use App\Filament\Seller\Resources\Establishments\Pages\ViewEstablishment;
use App\Filament\Seller\Resources\Establishments\RelationManagers\ActivitiesRelationManager;
use App\Filament\Seller\Resources\Establishments\Schemas\EstablishmentForm;
use App\Filament\Seller\Resources\Establishments\Schemas\EstablishmentInfolist;
use App\Filament\Seller\Resources\Establishments\Tables\EstablishmentsTable;
use App\Models\Establishment;
use BackedEnum;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class EstablishmentResource extends Resource
{
    protected static ?string $model = Establishment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('seller_id', Auth::user()->seller->id);
    }

    public static function form(Schema $schema): Schema
    {
        return EstablishmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EstablishmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EstablishmentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ActivitiesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEstablishments::route('/'),
            'create' => CreateEstablishment::route('/create'),
            'view' => ViewEstablishment::route('/{record}'),
            'edit' => EditEstablishment::route('/{record}/edit'),
        ];
    }
}
