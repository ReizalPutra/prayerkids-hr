<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Definisikan dengan Guard Name agar aman untuk API
        $permissions = [
            'manage_divisions',
            'view_divisions',
            'manage_positions',
            'view_positions',
            'view_employees',
            'create_employees',
            'edit_employees',
            'delete_employees',
            'view_attendance_all',
            'view_attendance_own',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'api']);
        }

        // 2. Buat Role dan Assign secara spesifik

        // Admin: Semua akses
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'api'])
            ->syncPermissions(Permission::all());

        // HR: Kelola operasional tapi mungkin tidak bisa hapus jabatan permanen
        Role::firstOrCreate(['name' => 'hr', 'guard_name' => 'api'])
            ->syncPermissions([
                'view_divisions',
                'manage_divisions',
                'view_positions',
                'view_employees',
                'create_employees',
                'edit_employees',
                'view_attendance_all'
            ]);

        // Employee: Akses minimal
        Role::firstOrCreate(['name' => 'employee', 'guard_name' => 'api'])
            ->syncPermissions([
                'view_attendance_own',
                'view_divisions',
                'view_positions'
            ]);
    }
}
