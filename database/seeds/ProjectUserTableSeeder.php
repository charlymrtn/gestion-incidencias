<?php

use Illuminate\Database\Seeder;

use App\Models\ProjectUser as Asignacion;

class ProjectUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Asignacion::create([
            'project_id' => 1,
            'user_id' => 2,
            'level_id' => 3
        ]);

        Asignacion::create([
            'project_id' => 1,
            'user_id' => 3,
            'level_id' => 1
        ]);

        Asignacion::create([
            'project_id' => 2,
            'user_id' => 2,
            'level_id' => 2
        ]);

        Asignacion::create([
            'project_id' => 2,
            'user_id' => 3,
            'level_id' => 4
        ]);

    }
}
