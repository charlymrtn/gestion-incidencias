<?php

use Illuminate\Database\Seeder;

use App\Models\Incident as Bug;

class IncidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Bug::create([
            'title' => 'Incidencia 1',
            'description' => 'Descripcion incidencia 1',
            'severity' => 'M',
            //'category_id' = ,
            'project_id' => 1,
            'level_id' => 1,
            'client_id' => 2
            //'support_id' = 2
        ]);

        Bug::create([
            'title' => 'Incidencia 2',
            'description' => 'Descripcion incidencia 2',
            'severity' => 'N',
            'category_id' => 2,
            'project_id' => 2,
            'level_id' => 2,
            'client_id' => 3
            //'support_id' = ,
        ]);

        Bug::create([
            'title' => 'Incidencia 3',
            'description' => 'Descripcion incidencia 3',
            'severity' => 'A',
            'category_id' => 1,
            'project_id' => 1,
            'level_id' => 3,
            'client_id' => 4,
            'support_id' => 2,
        ]);

        Bug::create([
            'title' => 'Incidencia 4',
            'description' => 'Descripcion incidencia 4',
            'severity' => 'M',
            'category_id' => 4,
            'project_id' => 2,
            'level_id' => 4,
            'client_id' => 5,
            'support_id' => 3,
        ]);

        Bug::create([
            'title' => 'Incidencia 5',
            'description' => 'Descripcion incidencia 5',
            'severity' => 'A',
            'category_id' => 3,
            'project_id' => 1,
            'level_id' => 3,
            'client_id' => 2
            //'support_id' = ,
        ]);

        Bug::create([
            'title' => 'Incidencia 6',
            'description' => 'Descripcion incidencia 6',
            'severity' => 'M',
            //'category_id' = ,
            'project_id' => 2,
            'level_id' => 4,
            'client_id' => 4,
            'support_id' => 2
        ]);
    }
}
