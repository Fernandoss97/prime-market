<?php

namespace App\Filament\Seller\Resources\Establishments\RelationManagers;

use App\Filament\Seller\Resources\Activities\ActivityResource;
use App\Filament\Seller\Resources\Establishments\EstablishmentResource;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;


class ActivitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'activities';
    protected static ?string $relatedResource = ActivityResource::class;
    protected static ?string $title = 'Atividades';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                Textarea::make('description'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table

            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'danger',
                    }),
                TextColumn::make('duration_minutes')
                    ->label('Duration (minutes)'),

            ])
            ->defaultSort('name');
    }
}
