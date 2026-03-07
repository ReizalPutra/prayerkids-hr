<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\PermissionRegistrar;

pest()
    ->extend(Tests\TestCase::class)
    ->use(RefreshDatabase::class)
    ->beforeEach(function () {

        // Reset cache permission Spatie
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Jalankan seeder role & permission
        $this->seed(Database\Seeders\RolePermissionSeeder::class);

        // Reset lagi setelah seeding (penting untuk Spatie)
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    })
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Custom Expectations
|--------------------------------------------------------------------------
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Helper Functions
|--------------------------------------------------------------------------
*/

function createAdmin(): User
{
    $user = User::factory()->create();

    $user->assignRole('admin');

    return $user->fresh(); // pastikan relasi role terbaca
}

function createHr(): User
{
    $user = User::factory()->create();

    $user->assignRole('hr');

    return $user->fresh();
}