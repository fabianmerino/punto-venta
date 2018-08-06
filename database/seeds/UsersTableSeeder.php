<?php

use App\User;
use Illuminate\Database\Seeder;

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
            'nombre_completo' => 'Administrador de la tienda',
            'usuario' => 'admin',
            'correo' => 'admin@example.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
