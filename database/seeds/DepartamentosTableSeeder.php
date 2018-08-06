<?php

use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \App\Departamento::create([
            'nombre' => 'Sin Departamento'
        ]);
    }
}
