<?php

use App\Impuesto;
use Illuminate\Database\Seeder;

class ImpuestosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Impuesto::create(
            [
                'nombre' => 'IGV',
                'porcentaje'=> 18,
                'defecto' => 'T',
                'activo' => 'T'
            ]
        );
    }
}
