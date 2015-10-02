<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \GlobProject\Entities\User::truncate();
        factory(\GlobProject\Entities\User::class, 10)->create();
    }
}
