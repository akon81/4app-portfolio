<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $email;

    public string $phone;

    public string $facebook;

    public string $instagram;
    public int $homepage_projects_count;

    public static function group(): string
    {
        return 'general';
    }
}
