<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if( !User::where('email', 'admin@blogapp.com')->exists() ){
            User::create([
                'name' => 'Admin',
                'email' => 'admin@blogapp.com',
                'password' => Hash::make('secret'),
                'is_admin' => 1,
            ]);
        }
    }
}
