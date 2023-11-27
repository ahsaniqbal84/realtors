<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('roles')->insert([
            ['name' => 'Finance'],
            ['name' => 'HR'],
            ['name' => 'Admin'],
        ]);

        \App\Models\User::factory()->create([
            'user_name' => 'ahsan test',
            'email' => 'ahsan@test.com',
            'password' => 'password',
            'role_id' => 1,
        ]);

        \App\Models\User::factory(10)->create();

        
    }
}
