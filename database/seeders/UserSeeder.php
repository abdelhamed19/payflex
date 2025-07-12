<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Developer',
                'last_name' => 'Developer',
                'email' => 'developer@developer.com',
                'password' => bcrypt('123456789'),
                'phone' => '123456789',
                'image' => null,
                'is_active' => 1,
                'lang' => null,
                'address' => '123 Main St, City, Country',
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'super@admin.com',
                'password' => bcrypt('123456789'),
                'phone' => '123456789',
                'image' => null,
                'is_active' => 1,
                'lang' => null,
                'address' => '123 Main St, City, Country',
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456789'),
                'phone' => '123456789',
                'image' => null,
                'is_active' => 1,
                'lang' => null,
                'address' => '123 Main St, City, Country',
                'role_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'User',
                'last_name' => 'user',
                'email' => 'user@user.com',
                'password' => bcrypt('123456789'),
                'phone' => '123456789',
                'image' => null,
                'is_active' => 1,
                'lang' => null,
                'address' => '123 Main St, City, Country',
                'role_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
