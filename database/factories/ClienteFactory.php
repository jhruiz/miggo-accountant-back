<?php

namespace Database\Factories;

use App\Models\Tercero;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{

    public function definition()
    {
        $terceros = Tercero::orderBy('id', 'ASC')->pluck('id')->all();
        $users = User::orderBy('id', 'ASC')->pluck('id')->all();

        return [
            'diascredito'=>$this->faker->randomNumber($nbDigits = 2),
            'limitecredito'=>$this->faker->randomNumber($nbDigits = 4),
            'observaciones'=>$this->faker->address,
            'estadisticas'=>$this->faker->randomNumber($nbDigits = 2),
            'estatus' => $this->faker->randomElement($array = array (0,1)),
            'user_id' => $this->faker->randomElement($users),
            'empresa_id' => 1,
            'Tercero_id' => $this->faker->unique()->randomElement($terceros),
        ];
    }
}
