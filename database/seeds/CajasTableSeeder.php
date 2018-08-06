<?php

use App\Caja;
use Illuminate\Database\Seeder;

class CajasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caja::create([
            'nombre' => 'Caja principal',
            'es_principal' => 'T'
        ]);
    }
}
