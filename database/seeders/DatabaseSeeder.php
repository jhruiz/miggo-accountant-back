<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->truncateTable([
            'users'
        ]);

         \App\Models\User::factory(50)->create();
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
