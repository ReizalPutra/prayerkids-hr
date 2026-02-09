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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Buat Permission (Hak Akses Spesifik)
        // Master Data
        Permission::create(['name' => 'manage_divisions']);
        Permission::create(['name' => 'manage_positions']);
        
        // Employee
        Permission::create(['name' => 'view_employees']);
        Permission::create(['name' => 'create_employees']);
        Permission::create(['name' => 'edit_employees']);
        Permission::create(['name' => 'delete_employees']); // Bahaya
        
        // Attendance
        Permission::create(['name' => 'view_attendance_all']); // Buat HR/Admin
        Permission::create(['name' => 'view_attendance_own']); // Buat Karyawan Biasa

        // 3. Buat Role & Assign Permission
        
        // A. Admin (Super Power)
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(Permission::all()); // Kasih semua akses

        // B. HR Staff
        $roleHR = Role::create(['name' => 'hr']);
        $roleHR->givePermissionTo([
            'view_employees', 'create_employees', 'edit_employees',
            'view_attendance_all',
            'manage_divisions'
        ]);

        // C. Employee (Karyawan Biasa)
        $roleEmployee = Role::create(['name' => 'employee']);
        $roleEmployee->givePermissionTo([
            'view_attendance_own'
        ]);

        // 4. Buat User Demo (Otomatis Assign Role)
        
        $admin = User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'password' => bcrypt('password123')
        ]);
        $admin->assignRole('admin'); // <--- Cara pasang role

        $hr = User::create([
            'name' => 'Mba HRD',
            'username' => 'hrd',
            'password' => bcrypt('password123')
        ]);
        $hr->assignRole('hr');

        $karyawan = User::create([
            'name' => 'Udin Penyok',
            'username' => 'udin',
            'password' => bcrypt('password123')
        ]);
        $karyawan->assignRole('employee');
    }
}
