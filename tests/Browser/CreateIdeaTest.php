<?php

use App\Models\User;

it('can create idea', function() {
    $this->actingAs($user = User::factory()->create());

    visit('/ideas')
        ->click('@create-idea-button')
        ->fill('title','Some Example Title')
        ->click('@button-status-completed')
        ->fill('description','An example Description')
        ->fill('new-link','https://laracasts.com')
        ->click('@submit-new-link-button')
        ->fill('new-link','https://laravel.com')
        ->click('@submit-new-link-button')
        ->click('Create')
        ->assertPathIs('/ideas');

        expect($user->ideas()->first())->toMatchArray([
            'title' => 'Some Example Title',
            'status' =>'completed',
            'description' =>'An example Description',
            'links' => ['https://laracasts.com', 'https://laravel.com'],
        ]);
});

