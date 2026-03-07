<?php

use App\Models\AttendanceLocation;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    $this->admin = createAdmin();
});

test('admin can see all locations', function () {
    AttendanceLocation::factory()->count(3)->create();

    Sanctum::actingAs($this->admin);

    $response = $this->getJson('/api/attendanceLocations');

    $response->assertStatus(200)
        ->assertJsonPath('meta.status', 'success')
        ->assertJsonCount(3, 'data');
});

test('admin can create a new location', function () {
    Sanctum::actingAs($this->admin);

    $response = $this->postJson('/api/attendanceLocations', [
        'name' => 'Office - Lantai 3',
        'latitude' => -6.2090,
        'longitude' => 106.8460,
        'radius_meter' => 25,
        'qr_token' => 'token123456789012345678901234567',
        'is_active' => true
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('data.name', 'Office - Lantai 3');

    $this->assertDatabaseHas('attendance_locations', ['name' => 'Office - Lantai 3']);
});

test('validation error when creating location without required fields', function () {
    Sanctum::actingAs($this->admin);

    $response = $this->postJson('/api/attendanceLocations', [
        'name' => '',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'latitude', 'longitude']);
});

test('admin can view specific location', function () {
    $location = AttendanceLocation::factory()->create();

    Sanctum::actingAs($this->admin);

    $response = $this->getJson("/api/attendanceLocations/{$location->id}");

    $response->assertStatus(200)
        ->assertJsonPath('data.name', $location->name);
});

test('admin can update a location', function () {
    $location = AttendanceLocation::factory()->create();

    Sanctum::actingAs($this->admin);

    $response = $this->patchJson("/api/attendanceLocations/{$location->id}", [
        'name' => 'Updated Location',
        'latitude' => -6.2100,
        'longitude' => 106.8470,
        'radius_meter' => 30,
        'is_active' => false
    ]);

    $response->assertStatus(200);
    $responseData = $response->json('data');
    expect($responseData['name'])->toBe('Updated Location');
    expect($responseData['is_active'])->toBe(false);

    $this->assertDatabaseHas('attendance_locations', ['name' => 'Updated Location']);
});

test('admin can soft delete a location', function () {
    $location = AttendanceLocation::factory()->create();

    Sanctum::actingAs($this->admin);

    $response = $this->deleteJson("/api/attendanceLocations/{$location->id}");

    $response->assertStatus(200);

    // Check that location is soft deleted
    $deletedLocation = AttendanceLocation::withTrashed()->find($location->id);
    expect($deletedLocation->deleted_at)->not->toBeNull();
});

test('non-admin cannot delete a location', function () {
    $employee = User::factory()->create();
    $employee->assignRole('employee');

    $location = AttendanceLocation::factory()->create();

    Sanctum::actingAs($employee);

    $response = $this->deleteJson("/api/attendanceLocations/{$location->id}");

    $response->assertStatus(403); // Forbidden
});

test('location with active status should be retrievable', function () {
    AttendanceLocation::factory()->count(2)->state(['is_active' => true])->create();
    AttendanceLocation::factory()->state(['is_active' => false])->create();

    Sanctum::actingAs($this->admin);

    $response = $this->getJson('/api/attendanceLocations');

    $response->assertStatus(200)
        ->assertJsonCount(3, 'data');
});
