<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            'id' => 'PLES106974291619c8d8d8661c4b509b1a154d20451197',
            'description' => 'Movistar Arena',
            'city' => 'Bogotá',
            'capacity' => 14000,
            'created_at' => now(),
        ]);
        DB::table('places')->insert([
            'id' => 'PLES10697429168547911d1d574cdb8d14b3d525fefa18',
            'description' => 'Estadio El Campín',
            'city' => 'Bogotá',
            'capacity' => 36343,
            'created_at' => now(),
        ]);
        DB::table('places')->insert([
            'id' => 'PLES10697429167ee42a2d2be145db961b5ef4ef9c1432',
            'description' => 'Teatro Colón',
            'city' => 'Bogotá',
            'capacity' => 785,
            'created_at' => now(),
        ]);
    }
}
