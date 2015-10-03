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

        factory(\GlobProject\Entities\User::class)->create([
            'name' => 'William',
            'email' => 'contato@globsecure.com.br',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);

        factory(\GlobProject\Entities\User::class, 10)->create();
    }
}
