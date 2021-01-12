<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $roles = [
        ['nombre' => 'SUPERADMIN','superadmin' =>true,'estado'=>true],
        ['nombre' => 'USUARIO','superadmin' =>false,'estado'=>true],
        ['nombre' => 'MEDICO','superadmin' =>false,'estado'=>true]

        ];
    public function run()
    {
        //
        DB::table('rols')->insert($this->roles);
    }
}
