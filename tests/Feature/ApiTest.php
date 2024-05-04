<?php

use App\Models\User;

test('Testing user can be viewed', function () {

    $user = User::factory()->create([
        'id' => 10,
        'name' => 'Ravshan'
    ]);

    $response = $this
        ->actingAs($user)
        ->get('/api/users/10');

    $response->assertOk();

    $response->assertJsonPath('data.name', $user->name);
});

