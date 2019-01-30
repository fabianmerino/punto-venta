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
            'role_id' => '1',
            'usuario' => 'admin',
            'correo' => 'admin@example.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
