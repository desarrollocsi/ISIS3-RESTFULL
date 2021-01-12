<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AntecedenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        //Array Antecedentes test
        private $antecedentes= [
                ['an_tipo' => 1,'an_destipo' => 'PERSONALES','an_codigo' => 1,'an_descripcion' => 'TUBERCULOSIS'],
                ['an_tipo' => 1,'an_destipo' => 'PERSONALES','an_codigo' => 2,'an_descripcion' => 'ENF. TRANSMISION SEXUAL'],
                ['an_tipo' => 1,'an_destipo' => 'PERSONALES','an_codigo' => 3,'an_descripcion' => 'VIH-SIDA'],
                ['an_tipo' => 1,'an_destipo' => 'PERSONALES','an_codigo' => 4,'an_descripcion' => 'HEPATITIS'],
                ['an_tipo' => 1,'an_destipo' => 'PERSONALES','an_codigo' => 5,'an_descripcion' => 'DIABETES'],
                ['an_tipo' => 1,'an_destipo' => 'PERSONALES','an_codigo' => 6,'an_descripcion' => 'HTA'],
                ['an_tipo' => 1,'an_destipo' => 'PERSONALES','an_codigo' => 7,'an_descripcion' => 'SOBREPESO'],
                ['an_tipo' => 1,'an_destipo' => 'PERSONALES','an_codigo' => 8,'an_descripcion' => 'INFARTO CARDIACO'],
                ['an_tipo' => 1,'an_destipo' => 'PERSONALES','an_codigo' => 9,'an_descripcion' => 'DISLIPIDEMIA (COLESTEROL)'],
                ['an_tipo' => 2,'an_destipo' => 'FAMILIARES','an_codigo' => 1,'an_descripcion' => 'TUBERCULOSIS'],
                ['an_tipo' => 2,'an_destipo' => 'FAMILIARES','an_codigo' => 2,'an_descripcion' => 'VIH-SIDA'],
                ['an_tipo' => 2,'an_destipo' => 'FAMILIARES','an_codigo' => 3,'an_descripcion' => 'ITS'],
                ['an_tipo' => 2,'an_destipo' => 'FAMILIARES','an_codigo' => 4,'an_descripcion' => 'HEPATITIS'],
                ['an_tipo' => 2,'an_destipo' => 'FAMILIARES','an_codigo' => 5,'an_descripcion' => 'DBM'],
                ['an_tipo' => 2,'an_destipo' => 'FAMILIARES','an_codigo' => 6,'an_descripcion' => 'HTA'],
                ['an_tipo' => 2,'an_destipo' => 'FAMILIARES','an_codigo' => 7,'an_descripcion' => 'INFARTO'],
                ['an_tipo' => 2,'an_destipo' => 'FAMILIARES','an_codigo' => 8,'an_descripcion' => 'CANCER'],
                ['an_tipo' => 2,'an_destipo' => 'FAMILIARES','an_codigo' => 9,'an_descripcion' => 'DEPRESION'],
                ['an_tipo' => 3,'an_destipo' => 'ALERGIAS','an_codigo' => 1,'an_descripcion' => 'ALERGIA A MEDICAMENTO'],
                ['an_tipo' => 3,'an_destipo' => 'ALERGIAS','an_codigo' => 1,'an_descripcion' => 'ALERGIA A ALIMENTO']
                ];
    public function run()
    {
        // DB::table('antecedentes')->truncate();        
        // self::userSAntecedentesSeedeed();
        // $this->command->info($this->rows.' :Users cargados!');
        DB::table('antecedentes')->insert($this->antecedentes);
    }
}
