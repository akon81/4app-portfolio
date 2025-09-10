<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->text(60),
            'description' => $this->faker->paragraph(),
            'url' => 'https://'.$this->faker->domainName(),
            'category_id' => null,
            'published_at' => now(),
        ];
    }
}
