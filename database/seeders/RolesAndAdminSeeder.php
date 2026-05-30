<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء الأدوار
        Role::create(['name' => 'super_admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'trainer']);

        // إنشاء الحساب
        $superAdmin = User::create([
            'name' => 'رئيس قسم الـ IT',
            'email' => 'head@it.edu', 
            'password' => Hash::make('password123'), 
        ]);

        // ربط الحساب بصلاحية رئيس القسم
        $superAdmin->assignRole('super_admin');
    }
}