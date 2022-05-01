<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'DrFanni',
                'email' => 'drfanni@gmail.com',
                'password' => Hash::make('14010101'),
                'created_at' => now()
            ]);

        // \App\Models\User::factory(10)->create();
    }
}
