<?php

use App\Models\User;

test('user can login with username', function () {
    // 1. Setup User
    $user = User::factory()->create([
        'username' => 'admin',
        'password' => bcrypt('password')
    ]);

    // 2. Tembak API
    $response = $this->postJson('/api/login', [
        'username' => 'admin',
        'password' => 'password'
    ]);

    // 3. Harapannya: Sukses & Ada Token
    $response->assertStatus(200)
        ->assertJsonStructure(['data' => ['access_token']]);
});
