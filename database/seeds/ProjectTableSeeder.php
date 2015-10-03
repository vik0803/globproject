<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \GlobProject\Entities\Project::truncate();
        factory(\GlobProject\Entities\Project::class, 10)->create();
    }
}
