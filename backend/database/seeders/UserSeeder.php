<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'hr']);
        Role::firstOrCreate(['name' => 'employee']);

        // 2. Buat User Admin (plus alias username umum)
        $admin = $this->upsertUser(
            username: 'admin_super',
            name: 'Super Admin',
            role: 'admin',
        );

        $this->upsertUser(
            username: 'admin',
            name: 'Admin',
            role: 'admin',
        );

        // 3. Buat User HR (plus alias staff_hr)
        $this->upsertUser(
            username: 'hr_staff',
            name: 'Staff HRD',
            role: 'hr',
        );

        $this->upsertUser(
            username: 'staff_hr',
            name: 'Staff HRD',
            role: 'hr',
        );

        // 4. Buat User Karyawan (Contoh)
        $employee = $this->upsertUser(
            username: 'karyawan_01',
            name: 'Budi Setiawan',
            role: 'employee',
        );

        Employee::updateOrCreate(
            ['user_id' => $employee->id],
            [
                'nik' => 'EMP-0001',
                'contract_number' => 'PKHR/CTR/0001',
                'full_name' => 'Budi Setiawan',
                'phone' => '081234567890',
                'address' => 'Jl. Contoh No. 1, Jakarta',
                'gender' => 'L',
                'join_date' => now()->toDateString(),
                'contract_start_date' => now()->toDateString(),
                'contract_end_date' => now()->addYear()->toDateString(),
                'leave_quota' => 12,
                'basic_salary' => 5000000,
                'status' => 'active',
            ]
        );
    }

    private function upsertUser(string $username, string $name, string $role): User
    {
        $user = User::updateOrCreate(
            ['username' => $username],
            [
                'name' => $name,
                'password' => Hash::make('password'),
            ]
        );

        $user->syncRoles([$role]);

        return $user;
    }
}
