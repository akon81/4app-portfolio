<?php

namespace App\Filament\Resources\TechStacks\Schemas;

use Filament\Schemas\Schema;

class TechStackForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Grid::make(1)
                    ->components([
                        \Filament\Forms\Components\TextInput::make('name')
                            ->label('Nazwa')
                            ->required(),
                        \Filament\Forms\Components\Textarea::make('description')
                            ->label('Opis'),
                        \Filament\Forms\Components\TextInput::make('order')
                            ->label('Kolejność')
                            ->numeric()
                            ->default(1),
                        \Filament\Forms\Components\FileUpload::make('icon')
                            ->label('Ikona')
                            ->image()
                            ->imagePreviewHeight('64')
                            ->directory('techstack-icons')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml'])
                            ->maxSize(2048),
                    ]),
            ]);
    }
}
