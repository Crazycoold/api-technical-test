<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            'id' => 1,
            'user_id' => null,
            'name' => 'Laravel Personal Access Client',
            'secret' => '1ny0aXiq2yf8kmH1AQOCsellxnWybUTtFuHSsVU8',
            'provider' => null,
            'redirect' => 'http://localhost',
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => '2021-11-26 05:32:22',
        ]);
        DB::table('oauth_clients')->insert([
            'id' => 2,
            'user_id' => null,
            'name' => 'Laravel Password Grant Client',
            'secret' => 'JtrKh2Vs36N0joBnq8v8tUYwq1DORKgN87BVgydP',
            'provider' => 'users',
            'redirect' => 'http://localhost',
            'personal_access_client' => 0,
            'password_client' => 1,
            'revoked' => 0,
            'created_at' => '2021-11-26 05:32:22',
        ]);
        DB::table('oauth_clients')->insert([
            'id' => 3,
            'user_id' => 1,
            'name' => 'PRUEBA TÉCNICA',
            'secret' => 'HbwPtE0EHPK0CNGqXIvkNpbcuOJCYSBeFXW235OM',
            'provider' => 'users',
            'redirect' => 'http://localhost',
            'personal_access_client' => 0,
            'password_client' => 1,
            'revoked' => 0,
            'created_at' => '2021-11-27 14:00:54',
        ]);
    }
}
