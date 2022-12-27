<?php

namespace Database\Factories;

use App\Models\Marcavehiculo;
use App\Models\Referencia;
use App\Models\Tipovehiculo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculoFactory extends Factory
{

    public function definition()
    {
        $tipovehiculos = Tipovehiculo::orderBy('id', 'ASC')->pluck('id')->all();
        $marcavehiculos = Marcavehiculo::orderBy('id', 'ASC')->pluck('id')->all();
        // $referencias = Referencia::orderBy('id', 'ASC')->pluck('id')->all();

        return [
            'placa'=> Str::random(6),
            'cilindraje'=>$this->faker->randomElement($array = array (1000,1200,1500,2000)),
            'modelo' => $this->faker->name(),
            'color' => $this->faker->colorName(),
            'num_motor'=>$this->faker->isbn10,
            'num_chasis'=>$this->faker->ean8,
            'linea'=>$this->faker->countryCode,
            'soat'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'tecno'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),

            'tipovehiculo_id' => $this->faker->randomElement($tipovehiculos),
            'marcavehiculo_id' => $this->faker->randomElement($marcavehiculos),
            // 'referencia_id' => $this->faker->randomElement($referencias),
            'empresa_id' => 1,
            
        ];
    }
}
