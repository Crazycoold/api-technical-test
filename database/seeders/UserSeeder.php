<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Juan David Ramírez',
            'email' => 'juandaleja@gmail.com',
            'email_verified_at' => null,
            'password' => '$2y$10$AlvZh0hVjjwVuT4rAMMUB.qL0SSHJmNgh.r8r92.5jum8YA2o1s1.',
            'remember_token' => null,
            'created_at' => now(),
        ]);
    }
}
