<?php

use App\Models\Shift;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->admin = createAdmin();
});

test('admin can see all shifts', function () {
    Shift::factory()->count(3)->create();

    Sanctum::actingAs($this->admin);

    $response = $this->getJson('/api/shifts');

    $response->assertStatus(200)
        ->assertJsonPath('meta.status', 'success')
        ->assertJsonCount(3, 'data');
});

test('admin can create a new shift', function () {
    Sanctum::actingAs($this->admin);

    $response = $this->postJson('/api/shifts', [
        'name' => 'Shift Custom',
        'start_time' => '08:00:00',
        'end_time' => '16:00:00'
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('data.name', 'Shift Custom');

    $this->assertDatabaseHas('shifts', ['name' => 'Shift Custom']);
});

test('validation error when creating shift without name', function () {
    Sanctum::actingAs($this->admin);

    $response = $this->postJson('/api/shifts', [
        'name' => '',
        'start_time' => '08:00:00',
        'end_time' => '16:00:00'
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['name']);
});

test('admin can view specific shift', function () {
    $shift = Shift::factory()->create();

    Sanctum::actingAs($this->admin);

    $response = $this->getJson("/api/shifts/{$shift->id}");

    $response->assertStatus(200)
        ->assertJsonPath('data.name', $shift->name);
});

test('admin can update a shift', function () {
    $shift = Shift::factory()->create();

    Sanctum::actingAs($this->admin);

    $response = $this->patchJson("/api/shifts/{$shift->id}", [
        'name' => 'Updated Shift',
        'start_time' => '09:00:00',
        'end_time' => '17:00:00'
    ]);

    $response->assertStatus(200)
        ->assertJsonPath('data.name', 'Updated Shift');

    $this->assertDatabaseHas('shifts', ['name' => 'Updated Shift']);
});

test('admin can soft delete a shift', function () {
    $shift = Shift::factory()->create();

    Sanctum::actingAs($this->admin);

    $response = $this->deleteJson("/api/shifts/{$shift->id}");

    $response->assertStatus(200);
    $this->assertSoftDeleted('shifts', ['id' => $shift->id]);
});

test('non-admin cannot delete a shift', function () {
    $employee = User::factory()->create();
    $employee->assignRole('employee');

    $shift = Shift::factory()->create();

    Sanctum::actingAs($employee);

    $response = $this->deleteJson("/api/shifts/{$shift->id}");

    $response->assertStatus(403); // Forbidden
});
