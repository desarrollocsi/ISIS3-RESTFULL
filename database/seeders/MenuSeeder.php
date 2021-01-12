<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $menus= [
        ['nivel' => 0,'nombre' => 'ADMISION','padre' => 0,'accion' => '/admision','icono'=>'','estado'=>true],
        ['nivel' => 1,'nombre' => 'PACIENTES','padre' => 1,'accion' => '/admision/pacientes','icono'=>'','estado'=>true],
        ['nivel' => 2,'nombre' => 'ACREDITACION','padre' => 2,'accion' => '/admision/pacientes/acreditacion','icono'=>'','estado'=>true],
        ['nivel' => 2,'nombre' => 'ADMISION','padre' => 2,'accion' => '/admision/pacientes/admision','icono'=>'','estado'=>true],
        ['nivel' => 2,'nombre' => 'HISTORIA CLINICA','padre' => 2,'accion' => '/admision/pacientes/historiaclinica','icono'=>'','estado'=>true],
        ['nivel' => 2,'nombre' => 'CONSULTA ATENCIONES','padre' => 2,'accion' => '/admision/pacientes/consultaatencion','icono'=>'','estado'=>true],

        ['nivel' => 1,'nombre' => 'CITAS','padre' => 1,'accion' => 'admision/citas','icono'=>'','estado'=>true],
        ['nivel' => 2,'nombre' => 'PROGRAMACION','padre' => 7,'accion' => '/admision/citas/programacion','icono'=>'','estado'=>true],
        ['nivel' => 2,'nombre' => 'ACTO MEDICO','padre' => 7,'accion' => '/admision/citas/actomedico','icono'=>'','estado'=>true],
        ['nivel' => 2,'nombre' => 'AGENDA MEDICA','padre' => 7,'accion' => '/admision/citas/agendamedica','icono'=>'','estado'=>true],

        ['nivel' => 1,'nombre' => 'FICHEROS','padre' => 1,'accion' => '/admision/ficheros','icono'=>'','estado'=>true],
        ['nivel' => 2,'nombre' => 'ESPECIALIDADES','padre' => 11,'accion' => '/admision/ficheros/especialidades','icono'=>'','estado'=>true],
        ['nivel' => 2,'nombre' => 'MEDICOS','padre' => 11,'accion' => '/admision/ficheros/medicos','icono'=>'','estado'=>true],
        ['nivel' => 2,'nombre' => 'TURNOS','padre' => 11,'accion' => '/admision/ficheros/turnos','icono'=>'','estado'=>true],
        ['nivel' => 2,'nombre' => 'CONSULTORIOS','padre' => 11,'accion' => '/admision/ficheros/consultorios','icono'=>'','estado'=>true],

        ['nivel' => 0,'nombre' => 'SEGURIDAD','padre' => 0,'accion' => '/seguridad','icono'=>'keypad','estado'=>true],
        ['nivel' => 1,'nombre' => 'FICHEROS','padre' => 16,'accion' => '/seguridad/ficheros','icono'=>'paper-plane','estado'=>true],
        ['nivel' => 2,'nombre' => 'USUARIOS','padre' => 17,'accion' => '/seguridad/ficheros/usuarios','icono'=>'paper-plane','estado'=>true],
        ['nivel' => 2,'nombre' => 'PERFILES','padre' => 17,'accion' => '/seguridad/ficheros/perfiles','icono'=>'paper-plane','estado'=>true],
        ['nivel' => 2,'nombre' => 'MODULOS','padre' => 17,'accion' => '/seguridad/ficheros/modulos','icono'=>'paper-plane','estado'=>true],
        ];
    public function run()
    {     
        DB::table('menus')->insert($this->menus);
    }
}
