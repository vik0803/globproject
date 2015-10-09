<?php

use Illuminate\Database\Seeder;

class ProjectTasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \GlobProject\Entities\ProjectTasks::truncate();
        factory(\GlobProject\Entities\ProjectTasks::class, 50)->create();
    }
}
