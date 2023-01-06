<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $sql = database_path($path= 'precarga_estatica/miggo_cloudmenus.sql');
        DB::unprepared(file_get_contents($sql));
    }
}
