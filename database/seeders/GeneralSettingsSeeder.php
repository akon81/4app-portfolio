<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Settings\GeneralSettings;

class GeneralSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = new GeneralSettings([
            'email' => 'kontakt@example.com',
            'phone' => '+48 123 456 789',
            'facebook' => 'https://facebook.com/example',
            'instagram' => 'https://instagram.com/example',
            'homepage_projects_count' => 6,
        ]);
        $settings->save();
    }
}
