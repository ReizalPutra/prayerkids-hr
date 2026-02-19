<?php

use App\Models\Division;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->admin = createAdmin();
    
});

test('admin can see all divisions', function () {
    Division::factory()->count(3)->create();

    Sanctum::actingAs($this->admin);

    $response = $this->getJson('/api/divisions');

    $response->assertStatus(200)
        ->assertJsonPath('meta.status', 'success')
        ->assertJsonCount(3, 'data');
});

test('admin can create a new division', function () {
    Sanctum::actingAs($this->admin);

    $response = $this->postJson('/api/divisions', [
        'name' => 'IT Support',
        'description' => 'Technical department'
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('data.name', 'IT Support');

    $this->assertDatabaseHas('divisions', ['name' => 'IT Support']);
});

test('validation error when creating division without name', function () {
    Sanctum::actingAs($this->admin);

    $response = $this->postJson('/api/divisions', [
        'name' => '',
    ]);

    $response->assertStatus(422) // Unprocessable Entity
        ->assertJsonValidationErrors(['name']);
});
