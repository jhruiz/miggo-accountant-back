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
            'users','empresas','paises','departamentos','ciudades','terceros','clientes','proveedores','empleados','tipoidentificaciones',
            'partevehiculo_tipovehiculo','tipovehiculos','marcavehiculos','partevehiculos','ciiusecciones','ciiudivisiones','ciiugrupos',
            'ciiuclases','pucs','cloudmenus','perfiles','tipodirecciones', 'gradodeudores', 'clasificacioncontactos', 'terminospagos',
            'tiposocios','regimenes'

        ]);

        $this->call(PaisSeeder::class);
        $this->call(PerfileSeeder::class);
        $this->call(TipoidentificacioneSeeder::class);
        $this->call(TipovehiculoSeeder::class);
        $this->call(MarcavehiculoSeeder::class);
        $this->call(PartevehiculoSeeder::class);
        $this->call(CiiuseccioneSeeder::class);
        $this->call(CiiudivisioneSeeder::class);
        $this->call(CiiugrupoSeeder::class);
        $this->call(PucSeeder::class);
        $this->call(MenuSeeder::class);
        \App\Models\Tercero::factory(60)->create();
        \App\Models\Empresa::factory(1)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\Cliente::factory(10)->create();
        \App\Models\Proveedore::factory(10)->create();
        \App\Models\Empleado::factory(10)->create();
        \App\Models\Vehiculo::factory(10)->create();
        




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
