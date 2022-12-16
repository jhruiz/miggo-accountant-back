<?php

namespace Database\Seeders;

use App\Models\Tipoidentificacion;
use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->truncateTable([
            'users','empresas','departamentos','personas','clientes','proveedores','empleados','tipoidentificaciones'
        ]);

        $this->call(PaisSeeder::class);
        $this->call(PerfileSeeder::class);
        $this->call(TipoidentificacioneSeeder::class);
        \App\Models\Persona::factory(60)->create();
        \App\Models\Empresa::factory(1)->create();
        \App\Models\User::factory(4)->create();
        \App\Models\Cliente::factory(10)->create();
        \App\Models\Proveedore::factory(10)->create();
        \App\Models\Empleado::factory(10)->create();


                // \App\Models\User::factory(10)->create()->each(function($user){
                //     Post::factory()->for($user)->create();
                // });


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
