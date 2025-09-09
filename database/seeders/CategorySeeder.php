<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Strona internetowa',
            'slug' => 'strona-internetowa',
        ]);
        Category::create([
            'name' => 'Sklep internetowy',
            'slug' => 'sklep-internetowy',
        ]);
    }
}
