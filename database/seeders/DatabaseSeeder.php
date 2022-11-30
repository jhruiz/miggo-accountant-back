<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->truncateTable([
            'users','empresas','departamentos'
        ]);

        $this->call(PaisSeeder::class);
         \App\Models\Empresa::factory(1)->create();
         \App\Models\User::factory(10)->create();
    }

    protected function truncateTable(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach($tables as $table){
            DB::table($table)->truncate();

        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
    }
}
