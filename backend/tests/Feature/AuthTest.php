<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('user can login with username', function () {
    // 1. Setup User
    $user = User::factory()->create([
        'username' => 'admin',
        'password' => Hash::make('password')
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
test('user cannot login with wrong password', function () {

    User::factory()->create([
        'username' => 'admin',
        'password' => Hash::make('password')
    ]);

    $response = $this->postJson('/api/login', [
        'username' => 'admin',
        'password' => 'wrong'
    ]);

    $response->assertStatus(401);

});

