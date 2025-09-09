<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TechStack;

class TechStackSeeder extends Seeder
{
    public function run(): void
    {
        TechStack::create([
            'name' => 'Laravel',
            'description' => 'Framework PHP do aplikacji webowych',
            'order' => 1,
            'icon' => null,
        ]);
        TechStack::create([
            'name' => 'Vue.js',
            'description' => 'Framework JavaScript do interfejsów użytkownika',
            'order' => 2,
            'icon' => null,
        ]);
    }
}
