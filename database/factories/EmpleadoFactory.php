<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Tercero;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{

    public function definition()
    {
        $terceros = Tercero::orderBy('id', 'ASC')->pluck('id')->all();
        $users = User::orderBy('id', 'ASC')->pluck('id')->all();

        return [
            'sueldo'=>$this->faker->randomNumber($nbDigits = 5),
            'observaciones'=>$this->faker->address,
            'estadisticas'=>$this->faker->randomNumber($nbDigits = 2),
            'estatus' => $this->faker->randomElement($array = array (0,1)),
            'inicio'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            // 'numero_cuenta' => $this->faker->uuid,
            // 'tipo_cuenta' => 'Ahorro',
            'empresa_id' => 1,
            'tercero_id' => $this->faker->unique()->randomElement($terceros),
            'user_id' => $this->faker->randomElement($users),
        ];
    }
}
