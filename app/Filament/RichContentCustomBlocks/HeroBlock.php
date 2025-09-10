<?php

namespace App\Filament\RichContentCustomBlocks;

use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;

class HeroBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'hero';
    }

    public static function getLabel(): string
    {
        return 'Hero section';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalDescription('Konfiguruj sekcję hero')
            ->schema([
                TextInput::make('heading')->label('Nagłówek')->required(),
                TextInput::make('subheading')->label('Podnagłówek'),
            ]);
    }

    public static function toHtml(array $config, array $data): string
    {
        return sprintf('<section class="hero"><h1>%s</h1><h2>%s</h2></section>', $config['heading'] ?? '', $config['subheading'] ?? '');
    }
}
