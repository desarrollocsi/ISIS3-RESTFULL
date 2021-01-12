<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class MenuRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $menusrols= [
        ['id_rol' => 2,'id_menu' => 1],
        ['id_rol' => 2,'id_menu' => 2],
        ['id_rol' => 2,'id_menu' => 3],
        ['id_rol' => 2,'id_menu' => 4],
        ['id_rol' => 2,'id_menu' => 5],
        ['id_rol' => 2,'id_menu' => 6],
        ['id_rol' => 2,'id_menu' => 7],
        ['id_rol' => 2,'id_menu' => 8],

        ['id_rol' => 3,'id_menu' => 1],
        ['id_rol' => 3,'id_menu' => 2],        
        ['id_rol' => 3,'id_menu' => 3],
        ];
    public function run()
    {
        //
        DB::table('menus_rols')->insert($this->menusrols);
    }
}
