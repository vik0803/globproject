<?php

use Illuminate\Database\Seeder;

class ProjectNoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \GlobProject\Entities\ProjectNote::truncate();
        factory(\GlobProject\Entities\ProjectNote::class, 50)->create();
    }
}
