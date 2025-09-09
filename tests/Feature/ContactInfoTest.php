<?php

declare(strict_types=1);

use App\Models\ContactInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create contact info', function () {
    $info = ContactInfo::create([
        'email' => 'kontakt@4app.pl',
        'phone' => '+48123456789',
        'linkedin' => 'https://linkedin.com/in/4app',
        'github' => 'https://github.com/4app',
        'other_links' => 'https://twitter.com/4app',
    ]);

    expect($info->id)->not->toBeNull();
    expect($info->email)->toBe('kontakt@4app.pl');
    expect($info->phone)->toBe('+48123456789');
    expect($info->linkedin)->toBe('https://linkedin.com/in/4app');
    expect($info->github)->toBe('https://github.com/4app');
    expect($info->other_links)->toBe('https://twitter.com/4app');
});
