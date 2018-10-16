<?php

use Illuminate\Database\Seeder;
use App\Models\Level as Nivel;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nivel::create([
            'name' => 'Atención teléfonica',
            'project_id' => 1
        ]);

        Nivel::create([
            'name' => 'Mesa de ayuda',
            'project_id' => 2
        ]);

        Nivel::create([
            'name' => 'Ticket avanzado',
            'project_id' => 1
        ]);

        Nivel::create([
            'name' => 'Imposibles',
            'project_id' => 2
        ]);
    }
}
