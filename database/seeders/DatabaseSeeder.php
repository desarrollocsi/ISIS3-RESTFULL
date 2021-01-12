<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // dd(AntecedenteSeeder::class);
        // \App\Models\User::factory(10)->create();
        $this->truncatetables([
            'menus',
            'menus_rols',
            'rols',            
            'antecedentes',
        ]);
        $this->call(MenuSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(MenuRolesSeeder::class);
        $this->call(AntecedenteSeeder::class);
    }
    protected function truncatetables(array $tables){
        // DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        // DB::statement('SET session_replication_role = \'replica\';');
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
        // DB::statement('SET session_replication_role = \'origin\';');
        // DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
