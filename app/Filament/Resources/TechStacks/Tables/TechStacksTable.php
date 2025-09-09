<?php

namespace App\Filament\Resources\TechStacks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class TechStacksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->label('Nazwa')
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\ImageColumn::make('icon')
                    ->label('Ikona')
                    ->height(32),
                \Filament\Tables\Columns\TextColumn::make('description')
                    ->label('Opis')
                    ->limit(40),
                \Filament\Tables\Columns\TextInputColumn::make('order')
                    ->label('Kolejność')
                    ->sortable()
                    ->extraAttributes(['style' => 'width: 4rem']),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
