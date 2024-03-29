<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        \DB::statement("SET foreign_key_checks = 0");
        $this->call(UserTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(ProjectNoteTableSeeder::class);
        $this->call(ProjectTasksTableSeeder::class);
        $this->call(ProjectMembersTableSeeder::class);
        $this->call(OAuthClientTableSeeder::class);
        \DB::statement("SET foreign_key_checks = 1");

        Model::reguard();
    }
}
