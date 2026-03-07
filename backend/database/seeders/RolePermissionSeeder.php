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

        $permissions = [
            'manage_operational',
            'view_operational',
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

        foreach (['web', 'api'] as $guard) {
            foreach ($permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission, 'guard_name' => $guard]);
            }

            Role::firstOrCreate(['name' => 'admin', 'guard_name' => $guard])
                ->syncPermissions(Permission::query()->where('guard_name', $guard)->get());

            Role::firstOrCreate(['name' => 'hr', 'guard_name' => $guard])
                ->syncPermissions([
                    'view_divisions',
                    'manage_divisions',
                    'view_positions',
                    'view_employees',
                    'create_employees',
                    'edit_employees',
                    'view_attendance_all',
                ]);

            Role::firstOrCreate(['name' => 'employee', 'guard_name' => $guard])
                ->syncPermissions([
                    'view_attendance_own',
                    'view_divisions',
                    'view_positions',
                ]);
        }
    }
}
