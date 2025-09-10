<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Pages\SettingsPage;
use App\Settings\GeneralSettings;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class ManageMainSettings extends SettingsPage
{
 protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;
    protected static ?string $navigationLabel = 'Ustawienia główne';
    protected static ?string $title = 'Ustawienia główne';
    protected static string $settings = GeneralSettings::class;

    public ?array $data = [];

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public function mount(): void
    {
        $settings = app(GeneralSettings::class);
        $this->form->fill([
            'email' => $settings->email,
            'phone' => $settings->phone,
            'facebook' => $settings->facebook,
            'instagram' => $settings->instagram,
            'homepage_projects_count' => $settings->homepage_projects_count,
        ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        app(GeneralSettings::class)->fill($data)->save();

        Notification::make()
            ->success()
            ->title('Ustawienia zapisane!')
            ->send();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Grid::make(1)
                    ->components([
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required(),
                        TextInput::make('phone')
                            ->label('Telefon')
                            ->required(),
                        TextInput::make('facebook')
                            ->label('Facebook')
                            ->url(),
                        TextInput::make('instagram')
                            ->label('Instagram')
                            ->url(),
                        TextInput::make('homepage_projects_count')
                            ->label('Ilość projektów na stronie głównej')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(20)
                            ->required(),
                    ]),
            ]);
    }
}
