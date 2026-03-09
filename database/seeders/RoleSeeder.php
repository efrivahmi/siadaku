<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'superadmin',
            'admin',
            'teacher',
            'staff',
            'student',
            'parent',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Create initial Superadmin
        $superadmin = User::firstOrCreate(
            ['email' => 'admin@siadaku.test'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('password'), // Use a secure default layout
                'role' => 'superadmin',
                'is_active' => true,
            ]
        );
        
        if (!$superadmin->hasRole('superadmin')) {
             $superadmin->assignRole('superadmin');
        }
    }
}
