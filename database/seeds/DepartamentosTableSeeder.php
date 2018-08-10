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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('departamentos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
        \App\Departamento::create([
            'nombre' => 'Sin Departamento'
        ]);
    }
}
