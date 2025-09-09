<?php

declare(strict_types=1);

use App\Models\TechStack;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a tech stack entry', function () {
    $stack = TechStack::create([
        'name' => 'Laravel',
        'icon' => 'laravel.svg',
        'description' => 'Framework PHP',
        'order' => 1,
    ]);

    expect($stack->id)->not->toBeNull();
    expect($stack->name)->toBe('Laravel');
    expect($stack->icon)->toBe('laravel.svg');
    expect($stack->description)->toBe('Framework PHP');
    expect($stack->order)->toBe(1);
});
