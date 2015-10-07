<?php

use Illuminate\Database\Seeder;

class OAuthClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('oauth_clients')->delete();
        $datetime = \Carbon\Carbon::now();
        $clients = [
            [
                'id' => 'appid',
                'secret' => 'secret',
                'name' => 'GlobProject',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ]
        ];
        \DB::table('oauth_clients')->insert($clients);
        \DB::table('oauth_client_endpoints')->delete();
        $clientEndpoints = [
            [
                'client_id' => 'client1id',
                'redirect_uri' => '',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ]
        ];
        \DB::table('oauth_client_endpoints')->insert($clientEndpoints);
    }
}
