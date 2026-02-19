<?php

use App\Models\Position;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->admin = createAdmin();
     dump($this->admin->getRoleNames());
});

test('admin can create a position', function () {
    Sanctum::actingAs($this->admin);

    $response = $this->postJson('/api/positions', [
        'title' => 'Software Engineer',
        'base_salary' => 10000000
    ]);

    $response->assertStatus(201)
             ->assertJsonPath('data.title', 'Software Engineer');
});

test('non-admin cannot delete a position', function () {
    $staff = User::factory()->create();
    $staff->assignRole('employee');
    
    $position = Position::factory()->create();

    Sanctum::actingAs($staff);

    $response = $this->deleteJson("/api/positions/{$position->id}");

    $response->assertStatus(403); // Forbidden
});

test('admin can soft delete a position', function () {
    $position = Position::factory()->create();

    Sanctum::actingAs($this->admin);

    $response = $this->deleteJson("/api/positions/{$position->id}");

    $response->assertStatus(200);
    $this->assertSoftDeleted('positions', ['id' => $position->id]);
});