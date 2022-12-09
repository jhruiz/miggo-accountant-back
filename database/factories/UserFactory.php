<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    public function definition()
    {
        static $password;

        $personas = Persona::orderBy('id', 'ASC')->pluck('id')->all();

        $img = file_get_contents(__DIR__.'/../../public/images/profile/user-uploads'.'/user-'.'0'.rand(1, 9).'.jpg');
        $fileName = Str::random(5).'_'.'.jpg';
        static $password;
        file_put_contents("public/images/img_api/users/$fileName", $img);

        return [
            'username' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $password ?: $password = bcrypt('12345678'), // password
            'remember_token' => Str::random(10),
           // 'estatus' => $this->faker->randomElement($array = array (0,1)),
            'estadologin' => $this->faker->randomElement($array = array (0,1)),
            'intentos' => $this->faker->randomElement($array = array (1,2,3)),
            'preselect' => $this->faker->randomElement($array = array (1,2,3)),
            'email_verified_at' => now(),
            'validaciongestion'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'empresa_id' => 1,
            'imagen' =>  $fileName,
            'persona_id' => $this->faker->unique()->randomElement($personas),

            ];



    }


    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
