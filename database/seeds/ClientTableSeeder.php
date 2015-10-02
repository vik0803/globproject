<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \GlobProject\Entities\Client::truncate();
        factory(\GlobProject\Entities\Client::class, 10)->create();
    }
}
