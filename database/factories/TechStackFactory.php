<?php

namespace Database\Factories;

use App\Models\TechStack;
use Illuminate\Database\Eloquent\Factories\Factory;

class TechStackFactory extends Factory
{
    protected $model = TechStack::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'icon' => null,
            'description' => $this->faker->sentence(),
            'order' => 0,
        ];
    }
}
