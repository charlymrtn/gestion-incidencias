<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Categoría A1',
            'description' => 'Flight 10',
            'project_id' => 1
        ]);

        Category::create([
            'name' => 'Categoría A2',
            'description' => 'Flight 11',
            'project_id' => 2
        ]);

        Category::create([
            'name' => 'Categoría B1',
            'description' => 'Flight 12',
            'project_id' => 1
        ]);

        Category::create([
            'name' => 'Categoría B2',
            'description' => 'Flight 13',
            'project_id' => 2
        ]);
    }
}
