<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Category;
use App\Models\TechStack;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::first() ?? Category::factory()->create();
        $stacks = TechStack::factory()->count(3)->create();

        Project::factory()
            ->count(5)
            ->create(['category_id' => $category->id])
            ->each(function ($project) use ($stacks) {
                $project->techStacks()->sync($stacks->pluck('id')->toArray());
            });
    }
}
