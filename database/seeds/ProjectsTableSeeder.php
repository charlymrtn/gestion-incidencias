<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Proyecto X',
            'description' => 'Proyecto número uno.',
            'start_date' => date('Y-m-d')
        ]);

        Project::create([
            'name' => 'Proyecto Z',
            'description' => 'Proyecto número dos.',
            'start_date' => date('Y-m-d')
        ]);
    }
}
