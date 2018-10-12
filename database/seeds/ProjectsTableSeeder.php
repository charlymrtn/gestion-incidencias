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
            'description' => 'Proyecto número uno.'
        ]);

        Project::create([
            'name' => 'Proyecto Z',
            'description' => 'Proyecto número dos.'
        ]);
    }
}
