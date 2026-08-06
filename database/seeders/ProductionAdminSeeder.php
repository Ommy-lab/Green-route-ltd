<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ProductionAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => env('SUPER_ADMIN_EMAIL'),
            ],
            [
                'name' => env('SUPER_ADMIN_NAME', 'Super Administrator'),
                'password' => env('SUPER_ADMIN_PASSWORD'),
                'is_admin' => true,
                'role' => 'super_admin',
            ]
        );
    }
}
