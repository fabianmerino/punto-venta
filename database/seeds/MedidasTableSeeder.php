<?php

use App\Medida;
use Illuminate\Database\Seeder;

class MedidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('medidas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
        Medida::create(
            [
                'unid_enteros' => 'PZA',
                'unid_fracciones' => '',
            ]
        );
    
        Medida::create(
            [
                'unid_enteros' => 'M',
                'unid_fracciones' => 'CM',
                'factor' => '100'
            ]
        );
    
        Medida::create(
            [
                'unid_enteros' => 'KG',
                'unid_fracciones' => 'G',
                'factor' => '1000'
            ]
        );
    
        Medida::create(
            [
                'unid_enteros' => 'L',
                'unid_fracciones' => 'ML',
                'factor' => '1000'
            ]
        );
    
        Medida::create(
            [
                'unid_enteros' => 'H',
                'unid_fracciones' => 'MIN',
                'factor' => '60'
            ]
        );
    
        Medida::create(
            [
                'unid_enteros' => 'NO APLICA',
                'unid_fracciones' => '',
            ]
        );
        
    }
}
