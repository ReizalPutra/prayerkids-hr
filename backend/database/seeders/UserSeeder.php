<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // 2. Buat User Admin
        $admin = User::firstOrCreate(
            ['username' => 'admin_super'], // Unik ID
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // Sebaiknya ganti saat production
            ]
        );
        $admin->assignRole('admin');

        // 3. Buat User HR
        $hr = User::firstOrCreate(
            ['username' => 'hr_staff'],
            [
                'name' => 'Staff HRD',
                'password' => Hash::make('password'),
            ]
        );
        $hr->assignRole('hr');

        // 4. Buat User Karyawan (Contoh)
        $employee = User::firstOrCreate(
            ['username' => 'karyawan_01'],
            [
                'name' => 'Budi Setiawan',
                'password' => Hash::make('password'),
            ]
        );
        $employee->assignRole('employee');
    }
}
