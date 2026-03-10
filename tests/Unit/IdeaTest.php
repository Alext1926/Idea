<?php

use App\Models\Idea;
use App\Models\Step;
use App\Models\User;

test('it belongs to a user', function () {
    $idea = Idea::factory()->create();
    expect($idea->user)->toBeInstanceOf(User::class);
});

test('it can have steps', function () {
    $idea = Idea::factory()->create();

    // 1. Changed toBeNull() to toBeEmpty()
    expect($idea->steps)->toBeEmpty();

    $idea->steps()->create([
        'description' => 'Do the thing',
    ]);

    // 2. Fixed the arrow syntax: ->steps
    expect($idea->fresh()->steps)->toHaveCount(1);
});
