<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // All available permissions
        $permissions = [
            // Operational
            'manage_divisions',
            'view_divisions',
            'manage_positions',
            'view_positions',
            'manage_shifts',
            'view_shifts',
            'manage_attendance_locations',
            'view_attendance_locations',
            'manage_contract_templates',
            'view_contract_templates',

            // HR Management
            'view_employees',
            'create_employees',
            'edit_employees',
            'delete_employees',
            'view_attendance_all',
            'view_attendance_own',
            'create_attendance',
            'edit_attendance',
            'delete_attendance',
            'view_leave_requests',
            'create_leave_requests',
            'edit_leave_requests',
            'delete_leave_requests',
            'approve_leave_requests',
            'view_payrolls',
            'manage_payrolls',
            'view_performance_reviews',
            'manage_performance_reviews',

            // Recruitment
            'view_job_vacancies',
            'manage_job_vacancies',
            'view_applicants',
            'manage_applicants',
        ];

        foreach (['web', 'api'] as $guard) {
            // Create all permissions
            foreach ($permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission, 'guard_name' => $guard]);
            }

            // Admin: All permissions
            Role::firstOrCreate(['name' => 'admin', 'guard_name' => $guard])
                ->syncPermissions(Permission::query()->where('guard_name', $guard)->get());

            // HR Staff
            $hrPermissions = [
                'view_divisions',
                'manage_divisions',
                'view_positions',
                'manage_positions',
                'view_shifts',
                'view_attendance_locations',
                'manage_attendance_locations',

                'view_employees',
                'create_employees',
                'edit_employees',
                'delete_employees',
                'view_attendance_all',
                'create_attendance',
                'edit_attendance',
                'delete_attendance',
                'view_leave_requests',
                'create_leave_requests',
                'edit_leave_requests',
                'approve_leave_requests',
                'view_payrolls',
                'manage_payrolls',
                'view_performance_reviews',
                'manage_performance_reviews',
                'view_job_vacancies',
                'manage_job_vacancies',
                'view_applicants',
                'manage_applicants',
                'view_contract_templates',
                'manage_contract_templates',
            ];

            Role::firstOrCreate(['name' => 'hr', 'guard_name' => $guard])
                ->syncPermissions(
                    Permission::whereIn('name', $hrPermissions)
                        ->where('guard_name', $guard)
                        ->get()
                );

            // Employee
            $employeePermissions = [
                'view_divisions',
                'view_positions',
                'view_shifts',
                'view_attendance_locations',
                'view_attendance_own',
                'create_attendance',
                'view_leave_requests',
                'create_leave_requests',
                'view_job_vacancies',
            ];

            Role::firstOrCreate(['name' => 'employee', 'guard_name' => $guard])
                ->syncPermissions(
                    Permission::whereIn('name', $employeePermissions)
                        ->where('guard_name', $guard)
                        ->get()
                );
        }
    }
}
