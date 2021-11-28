<?php

namespace Database\Seeders;

use App\Models\basic\basic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $basic = new basic();
        DB::table('events')->insert([
            'id' => $basic->generateId('EVTS'),
            'id_places' => 'PLES106974291619c8d8d8661c4b509b1a154d20451197',
            'description' => 'DISNEY PRESENTA MAGIA Y SINFONIA',
            'availability' => 14000,
            'date' => '2021-12-30 19:00:00',
            'created_at' => now(),
        ]);
        DB::table('events')->insert([
            'id' => $basic->generateId('EVTS'),
            'id_places' => 'PLES10697429168547911d1d574cdb8d14b3d525fefa18',
            'description' => 'PARTIDO COLOMBIA VS BRASIL',
            'availability' => 36343,
            'date' => '2021-12-20 14:00:00',
            'created_at' => now(),
        ]);
        DB::table('events')->insert([
            'id' => $basic->generateId('EVTS'),
            'id_places' => 'PLES10697429167ee42a2d2be145db961b5ef4ef9c1432',
            'description' => 'CONCIERTO DE GALA BATUTA',
            'availability' => 785,
            'date' => '2021-12-15 20:00:00',
            'created_at' => now(),
        ]);
    }
}
