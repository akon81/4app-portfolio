<?php

namespace App\Filament\RichContentCustomBlocks;

use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;

class CallToActionBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'call_to_action';
    }

    public static function getLabel(): string
    {
        return 'Call to Action';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalDescription('Dodaj Call to Action')
            ->schema([
                TextInput::make('label')->label('Tekst przycisku')->required(),
                TextInput::make('url')->label('Adres URL'),
            ]);
    }

    public static function toHtml(array $config, array $data): string
    {
        return sprintf('<a class="cta" href="%s">%s</a>', $config['url'] ?? '#', $config['label'] ?? '');
    }
}
