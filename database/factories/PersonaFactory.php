<?php

namespace Database\Factories;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    public function definition()
    {
        $ciudades = Ciudad::orderBy('id', 'ASC')->pluck('id')->all();

        return [
            'nombres'=>$this->faker->name,
            'apellidos'=>$this->faker->lastName,
            'rut'=>$this->faker->unique()->randomNumber($nbDigits = 8),
            'identificacion'=>$this->faker->unique()->randomNumber($nbDigits = 8),
            'direccion'=>$this->faker->address,
            'celular'=>$this->faker->phoneNumber,
            'telefono'=>$this->faker->phoneNumber,
            'email'=> $this->faker->unique()->safeEmail(),
            'cumpleanios'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'ciudade_id' =>$this->faker->randomElement($ciudades),
        ];
    }
}
