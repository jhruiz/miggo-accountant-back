<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{

    public function definition()
    {
        $personas = Persona::orderBy('id', 'ASC')->pluck('id')->all();
        $users = User::orderBy('id', 'ASC')->pluck('id')->all();

        return [
            'sueldo'=>$this->faker->randomNumber($nbDigits = 5),
            'observaciones'=>$this->faker->address,
            'estadisticas'=>$this->faker->randomNumber($nbDigits = 2),
            'estatus' => $this->faker->randomElement($array = array (0,1)),
            'creador_id' => $this->faker->randomElement($users),
            'inicio'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            // 'numero_cuenta' => $this->faker->uuid,
            // 'tipo_cuenta' => 'Ahorro',
            'empresa_id' => 1,
            'persona_id' => $this->faker->unique()->randomElement($personas),
            // 'user_id' => $this->faker->randomElement($users),
        ];
    }
}
