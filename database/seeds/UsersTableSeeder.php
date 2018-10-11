<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Carlos Martin',
            'email' => 'carlos@correo.com',
            'password' => bcrypt('123'),
            'user_type' => 'A'
        ]);

        User::create([
            'name' => 'Leslie Martin',
            'email' => 'leslie@correo.com',
            'password' => bcrypt('123'),
            'user_type' => 'S'
        ]);

        User::create([
            'name' => 'Blacky Martin',
            'email' => 'blacky@correo.com',
            'password' => bcrypt('123'),
            'user_type' => 'C'
        ]);
    }
}
