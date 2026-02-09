<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Hapus cache permission (opsional tapi disarankan jika pakai Spatie)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Definisikan daftar permission
        $permissions = [
            // Master Data
            'manage_divisions',
            'manage_positions',
            // Employee
            'view_employees',
            'create_employees',
            'edit_employees',
            'delete_employees',
            // Attendance
            'view_attendance_all',
            'view_attendance_own',
        ];

        // 2. Buat Permission dengan firstOrCreate
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 3. Buat Role & Assign Permission

        // A. Admin (Super Power)
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $roleAdmin->syncPermissions(Permission::all());

        // B. HR Staff
        $roleHR = Role::firstOrCreate(['name' => 'hr']);
        $roleHR->syncPermissions([
            'view_employees',
            'create_employees',
            'edit_employees',
            'view_attendance_all',
            'manage_divisions'
        ]);

        // C. Employee (Karyawan Biasa)
        $roleEmployee = Role::firstOrCreate(['name' => 'employee']);
        $roleEmployee->syncPermissions([
            'view_attendance_own'
        ]);
    }
}
