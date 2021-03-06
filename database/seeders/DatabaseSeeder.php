<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'admin',
            'slug' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'role' => 1,
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'phone' => '0426975578'
        ]);
    }
}
