<?php

declare(strict_types=1);

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a project', function () {
    $project = Project::create([
        'title' => 'Test Project',
        'slug' => 'test-project',
        'description' => 'Opis testowego projektu',
        'category_id' => null,
        'published_at' => now(),
    ]);

    expect($project->id)->not->toBeNull();
    expect($project->title)->toBe('Test Project');
    expect($project->slug)->toBe('test-project');
    expect($project->description)->toBe('Opis testowego projektu');
    expect($project->published_at)->not->toBeNull();
});

it('can attach media to a project', function () {
    $project = Project::create([
        'title' => 'Media Project',
        'slug' => 'media-project',
        'description' => 'Projekt z mediami',
        'category_id' => null,
        'published_at' => now(),
    ]);

    // Tworzymy tymczasowy plik
    $file = tmpfile();
    fwrite($file, 'fake image content');
    $meta = stream_get_meta_data($file);
    $path = $meta['uri'];

    $project->addMedia($path)->preservingOriginal()->toMediaCollection('images');

    expect($project->getMedia('images'))->toHaveCount(1);

    fclose($file);
});
