<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin already exists
        $adminEmail = 'admin@admin.com';
        
        User::updateOrCreate(
            ['email' => $adminEmail],
            [
                'name' => 'bajakonstruksi',
                'password' => Hash::make('i5KKkyAvSNqv2@&u'),
            ]
        );
    }
}
