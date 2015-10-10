<?php

use Illuminate\Database\Seeder;

class ProjectMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \GlobProject\Entities\ProjectMember::truncate();
        factory(\GlobProject\Entities\ProjectMember::class, 50)->create();
    }
}
