<?php

declare(strict_types=1);


use App\Models\Project;
use App\Models\Category;
use App\Models\TechStack;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('creates a project with all fields', function () {
    $category = Category::factory()->create();
    $stack1 = TechStack::factory()->create();
    $stack2 = TechStack::factory()->create();

    $project = Project::create([
        'title' => 'Test Project',
        'slug' => Str::slug('Test Project'),
        'excerpt' => 'Krótki opis projektu',
        'description' => '<p>Opis <strong>projektu</strong></p>',
        'url' => 'https://domena.pl',
        'category_id' => $category->id,
        'published_at' => now(),
    ]);

    $project->techStacks()->sync([$stack1->id, $stack2->id]);

    expect($project->title)->toBe('Test Project');
    expect($project->slug)->toBe(Str::slug('Test Project'));
    expect($project->excerpt)->toBe('Krótki opis projektu');
    expect($project->description)->toContain('Opis');
    expect($project->url)->toBe('https://domena.pl');
    expect($project->category_id)->toBe($category->id);
    expect($project->published_at)->not->toBeNull();
    expect($project->techStacks)->toHaveCount(2);
});
